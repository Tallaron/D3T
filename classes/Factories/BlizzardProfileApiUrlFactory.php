<?php

namespace Factories;

/**
 * Factory that builds url strings with specified end points
 * API: Blizzard - Diablo 3 - Profile
 * Requires: Realm, Battle#Tag
 */
abstract class BlizzardProfileApiUrlFactory extends AbstractFactory {

    public static function getUrl($realm, $bTag) {
        return sprintf(
                self::getSettings()->get('BLIZZARD_D3_PROFILE_API_URL', $realm),
                $realm,
                str_replace('#', '-', $bTag));
    }

}
