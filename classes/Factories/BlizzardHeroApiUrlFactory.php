<?php

namespace Factories;

/**
 * Factory that builds url strings with specified end points
 * API: Blizzard - Diablo 3 - Hero
 * Requires: Realm, Battle#Tag, HeroId
 */
abstract class BlizzardHeroApiUrlFactory {

    public static function getUrl($realm, $bTag, $heroId) {
        return sprintf(
                BLIZZARD_D3_HERO_API_URL,
                $realm,
                str_replace('#', '-', $bTag),
                $heroId);
    }

}
