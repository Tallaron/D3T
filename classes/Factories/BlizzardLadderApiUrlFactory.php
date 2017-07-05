<?php

namespace Factories;

/**
 * Factory that builds url strings with specified end points
 * API: Blizzard - Diablo 3 - Ladder
 * Requires: Realm, SeasonFlag, HardcoreFlag, Index, Class
 */
abstract class BlizzardLadderApiUrlFactory extends AbstractFactory {

    public static function getUrl($realm, $season, $hardcore, $index, $class) {
        return sprintf(
                self::getSettings()->get('BLIZZARD_D3_LADDER_API_URL', $realm),
                $realm,
                self::determineMode($season),
                self::determineIndex($realm, $season, $index),
                $hardcore == 1 ? 'hardcore-' : '',
                $class);
    }
    
    private static function determineMode($seasonalNumFlag) {
        return $seasonalNumFlag == 1 ? 'season' : 'era';
    }
    
    private static function determineIndex($realm, $seasonalNumFlag, $index) {
        return $seasonalNumFlag == 1
            ? max(self::getSettings()->get('RANKING_MIN_SEASON_INDEX', $realm), min(self::getSettings()->get('RANKING_MAX_SEASON_INDEX', $realm), $index))
            : max(self::getSettings()->get('RANKING_MIN_ERA_INDEX', $realm), min(self::getSettings()->get('RANKING_MAX_ERA_INDEX', $realm), $index));
    }

}
