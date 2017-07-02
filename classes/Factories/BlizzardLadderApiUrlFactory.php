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
                BLIZZARD_D3_LADDER_API_URL,
                $realm,
                $season == 1 ? 'season' : 'era',
                $season == 1 
                    ? 
                    max(self::getSettings()->get('RANKING_MIN_SEASON_INDEX'), min(self::getSettings()->get('RANKING_MAX_SEASON_INDEX'), $index)) 
                    :
                    max(self::getSettings()->get('RANKING_MIN_ERA_INDEX'), min(self::getSettings()->get('RANKING_MAX_ERA_INDEX'), $index)),
                $hardcore == 1 ? 'hardcore-' : '',
                $class);
    }

}
