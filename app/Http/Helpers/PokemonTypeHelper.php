<?PHP

namespace App\Http\Helpers;

class PokemonTypeHelper {
  const NORMAL = 1;
  const FIRE = 2;
  const WATER = 3;
  const ELECTRIC = 4;
  const GRASS = 5;
  const ICE = 6;
  const FIGHTING = 7;
  const POISON = 8;
  const GROUND = 9;
  const FLYING = 10;
  const PSYCHIC = 11;
  const BUG = 12;
  const ROCK = 13;
  const GHOST = 14;
  const DRAGON = 15;
  const DARK = 16;
  const STEEL = 17;
  const FAIRY = 18;

  public static $weaknessTypeChart = [
    self::NORMAL => [self::ROCK, self::STEEL],
    self::FIRE => [self::FIRE, self::WATER, self::ROCK, self::DRAGON],
    self::WATER => [self::WATER, self::GRASS, self::DRAGON],
    self::ELECTRIC => [self::ELECTRIC, self::GRASS, self::DRAGON],
    self::GRASS => [self::FIRE, self::GRASS, self::POISON, self::FLYING, self::BUG, self::DRAGON, self::STEEL],
    self::ICE => [self::FIRE, self::WATER, self::ICE, self::STEEL],
    self::FIGHTING => [self::POISON, self::FLYING, self::PSYCHIC, self::BUG, self::FAIRY],
    self::POISON => [self::POISON, self::GROUND, self::ROCK, self::GHOST],
    self::GROUND => [self::GRASS, self::BUG],
    self::FLYING => [self::ELECTRIC, self::ROCK, self::STEEL],
    self::PSYCHIC => [self::PSYCHIC, self::STEEL],
    self::BUG => [self::FIRE, self::FIGHTING, self::POISON, self::FLYING, self::GHOST, self::STEEL, self::FAIRY],
    self::ROCK => [self::WATER, self::GRASS, self::FIGHTING, self::GROUND, self::STEEL],
    self::GHOST => [self::NORMAL, self::PSYCHIC],
    self::DRAGON => [self::STEEL],
    self::DARK => [self::FIGHTING, self::DARK, self::FAIRY],
    self::STEEL => [self::FIRE, self::WATER, self::ELECTRIC, self::STEEL],
    self::FAIRY => [self::FIRE, self::POISON, self::STEEL],
  ];

  public static function calculateDamage($attackerType, $defenderType, $defenderType2 = null) {
    $damageMultiplier = 1;

    $getDamageMultiplier = function ($defenderType) use($attackerType) {
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

  public static function calculateEffectivenessForType($defenderType, $defenderType2 = null) {
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
          $result['strong'][] = $type;
          break;
        case $damageMultiplier === 1:
          $result['neutral'][] = $type;
          break;
        case $damageMultiplier < 1:
          $result['weak'][] = $type;
          break;
      }
    }
    return $result;
  }
}
