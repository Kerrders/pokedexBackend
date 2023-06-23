<?PHP

namespace App\Http\Helpers;

class PokemonTypeHelper
{
    const NORMAL = 1;
    const FIGHTING = 2;
    const FLYING = 3;
    const POISON = 4;
    const GROUND = 5;
    const ROCK = 6;
    const BUG = 7;
    const GHOST = 8;
    const STEEL = 9;
    const FIRE = 10;
    const WATER = 11;
    const GRASS = 12;
    const ELECTRIC = 13;
    const PSYCHIC = 14;
    const ICE = 15;
    const DRAGON = 16;
    const DARK = 17;
    const FAIRY = 18;

    public static $weaknessTypeChart = [
        self::NORMAL => [self::ROCK, self::STEEL],
        self::FIRE => [self::WATER, self::GROUND, self::ROCK],
        self::WATER => [self::GRASS, self::ELECTRIC],
        self::ELECTRIC => [self::GROUND],
        self::GRASS => [self::FIRE, self::ICE, self::POISON, self::FLYING, self::BUG],
        self::ICE => [self::FIRE, self::FIGHTING, self::ROCK, self::STEEL],
        self::FIGHTING => [self::PSYCHIC, self::FLYING, self::FAIRY],
        self::POISON => [self::GROUND, self::PSYCHIC],
        self::GROUND => [self::WATER, self::GRASS, self::ICE],
        self::FLYING => [self::ELECTRIC, self::ICE, self::ROCK],
        self::PSYCHIC => [self::BUG, self::GHOST, self::DARK],
        self::BUG => [self::FIRE, self::FLYING, self::ROCK],
        self::ROCK => [self::WATER, self::GRASS, self::FIGHTING, self::GROUND, self::STEEL],
        self::GHOST => [self::GHOST, self::DARK],
        self::DRAGON => [self::ICE, self::DRAGON, self::FAIRY],
        self::DARK => [self::FIGHTING, self::BUG, self::FAIRY],
        self::STEEL => [self::FIRE, self::FIGHTING, self::GROUND],
        self::FAIRY => [self::POISON, self::STEEL],
    ];

    public static $immuneTypeChart = [
        self::NORMAL => [],
        self::FIRE => [],
        self::WATER => [],
        self::ELECTRIC => [],
        self::GRASS => [],
        self::ICE => [],
        self::FIGHTING => [self::GHOST],
        self::POISON => [self::STEEL],
        self::GROUND => [self::FLYING],
        self::FLYING => [self::GROUND],
        self::PSYCHIC => [],
        self::BUG => [],
        self::ROCK => [],
        self::GHOST => [self::NORMAL],
        self::DRAGON => [self::FAIRY],
        self::DARK => [],
        self::STEEL => [],
        self::FAIRY => [],
    ];

    public static function calculateDamage($attackerType, $defenderType, $defenderType2 = null)
    {
        $damageMultiplier = 1;

        $getDamageMultiplier = function ($defenderType) use ($attackerType) {
            switch (true) {
                case in_array($attackerType, self::$weaknessTypeChart[$defenderType]):
                    return 2;
                case in_array($defenderType, self::$weaknessTypeChart[$attackerType]):
                    return 0.5;
                default:
                    return 1;
            }
        };

        $damageMultiplier = $getDamageMultiplier($defenderType);
        if ($defenderType2) {
            $damageMultiplier *= $getDamageMultiplier($defenderType2);
        }

        return $damageMultiplier;
    }
    public static function calculateEffectivenessForType($defenderType, $defenderType2 = null)
    {
        $result = [
            'neutral' => [],
            'strong' => [],
            'weak' => [],
        ];

        $weaknessTypeChartKeys = array_keys(self::$weaknessTypeChart);
        foreach ($weaknessTypeChartKeys as $type) {
            $damageMultiplier = self::calculateDamage($type, $defenderType, $defenderType2);

            switch (true) {
                case $damageMultiplier > 1:
                    if (in_array($type, self::$weaknessTypeChart[$defenderType]) || ($defenderType2 && in_array($type, self::$weaknessTypeChart[$defenderType2]))) {
                        // Check immunity
                        if (!in_array($type, self::$immuneTypeChart[$defenderType]) && ($defenderType2 === null || !in_array($type, self::$immuneTypeChart[$defenderType2]))) {
                            $result['weak'][] = $type;
                        }
                    } else {
                        $result['strong'][] = $type;
                    }
                    break;

                case $damageMultiplier === 1:
                    $result['neutral'][] = $type;
                    break;

                case $damageMultiplier < 1:
                    $result['strong'][] = $type;
                    break;
            }
        }

        return $result;
    }
}
