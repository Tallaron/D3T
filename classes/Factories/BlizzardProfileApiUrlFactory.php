<?php

namespace Factories;

/**
 * Factory that builds url strings with specified end points
 * API: Blizzard - Diablo 3 - Profile
 * Requires: Realm, Battle#Tag
 */
abstract class BlizzardProfileApiUrlFactory {

    public static function getUrl($realm, $bTag) {
        return sprintf(
                BLIZZARD_D3_PROFILE_API_URL,
                $realm,
                str_replace('#', '-', $bTag));
    }

}
