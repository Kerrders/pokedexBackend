<?php

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
        self::FIGHTING => [self::FLYING, self::FAIRY],
        self::FLYING => [self::ELECTRIC, self::ICE, self::ROCK],
        self::POISON => [self::GROUND, self::PSYCHIC],
        self::GROUND => [self::WATER, self::GRASS, self::ICE],
        self::ROCK => [self::WATER, self::GRASS, self::FIGHTING, self::GROUND, self::STEEL],
        self::BUG => [self::FIRE, self::FLYING, self::ROCK],
        self::GHOST => [self::GHOST, self::DARK],
        self::STEEL => [self::FIRE, self::FIGHTING, self::GROUND, self::FAIRY],
        self::FIRE => [self::WATER, self::GRASS, self::ROCK],
        self::WATER => [self::ELECTRIC, self::GRASS],
        self::GRASS => [self::FIRE, self::ICE, self::POISON, self::FLYING, self::BUG],
        self::ELECTRIC => [self::GROUND],
        self::PSYCHIC => [self::BUG, self::GHOST, self::DARK],
        self::ICE => [self::FIRE, self::FIGHTING, self::ROCK, self::STEEL],
        self::DRAGON => [self::ICE, self::DRAGON, self::FAIRY],
        self::DARK => [self::FIGHTING, self::FAIRY],
        self::FAIRY => [self::POISON, self::STEEL],
    ];

    public static $resistanceTypeChart = [
        self::NORMAL => [],
        self::FIGHTING => [self::BUG, self::GRASS],
        self::FLYING => [self::GROUND, self::ROCK],
        self::POISON => [self::POISON, self::GROUND],
        self::GROUND => [self::POISON, self::ROCK, self::STEEL],
        self::ROCK => [self::NORMAL, self::FLYING, self::POISON],
        self::BUG => [self::GRASS, self::FLYING],
        self::GHOST => [self::NORMAL],
        self::STEEL => [self::NORMAL, self::FIRE, self::WATER, self::ELECTRIC, self::FAIRY],
        self::FIRE => [self::GROUND, self::ROCK],
        self::WATER => [self::FIRE, self::ELECTRIC],
        self::GRASS => [self::GROUND, self::WATER, self::FLYING],
        self::ELECTRIC => [self::GROUND],
        self::PSYCHIC => [self::FIGHTING],
        self::ICE => [self::FIRE, self::WATER, self::STEEL],
        self::DRAGON => [self::STEEL],
        self::DARK => [self::FIGHTING, self::FAIRY],
        self::FAIRY => [self::STEEL, self::FIRE],
    ];

    public static $immunityTypeChart = [
        self::NORMAL => [self::GHOST],
        self::FIGHTING => [self::GHOST],
        self::FLYING => [],
        self::POISON => [self::STEEL],
        self::GROUND => [self::FLYING],
        self::ROCK => [],
        self::BUG => [],
        self::GHOST => [self::NORMAL],
        self::STEEL => [],
        self::FIRE => [],
        self::WATER => [],
        self::GRASS => [],
        self::ELECTRIC => [self::GROUND],
        self::PSYCHIC => [self::DARK],
        self::ICE => [],
        self::DRAGON => [self::FAIRY],
        self::DARK => [],
        self::FAIRY => [],
    ];


    public static function getWeaknesses($type)
    {
        return self::$weaknessTypeChart[$type];
    }

    public static function getResistances($type)
    {
        return self::$resistanceTypeChart[$type];
    }

    public static function getImmunities($type)
    {
        return self::$immunityTypeChart[$type];
    }

    public static function calculateEffectivenessForType($defendType1, $defendType2 = null)
    {
        $result = [];
        $weaknessTypeChartKeys = array_keys(self::$weaknessTypeChart);

        foreach ($weaknessTypeChartKeys as $attackType) {
            $multiplier1 = self::calculateTypeMultiplier($attackType, $defendType1);
            $multiplier2 = ($defendType2) ? self::calculateTypeMultiplier($attackType, $defendType2) : 1;

            $damage = $multiplier1 * $multiplier2;

            $result[] = [
                'typeId' => $attackType,
                'damage' => $damage,
            ];
        }

        return $result;
    }

    private static function calculateTypeMultiplier($attackType, $defendType)
    {
        $multiplier = 1;

        if (in_array($attackType, self::$weaknessTypeChart[$defendType])) {
            $multiplier *= 2; // Super effective
        } elseif (in_array($attackType, self::$resistanceTypeChart[$defendType]) || $defendType === $attackType) {
            $multiplier *= 0.5; // Weak against
        } elseif (in_array($attackType, self::$immunityTypeChart[$defendType])) {
            $multiplier = 0; // Immunity
        }

        return $multiplier;
    }
}
