<?php

namespace Factories;

/**
 * Factory that builds url strings with specified end points
 * API: Blizzard - Diablo 3 - Item
 * Requires: Realm, Item
 * Item is represented by the slug or tooltipParams of the items
 */
abstract class BlizzardItemApiUrlFactory {
    
    public static function getUrl($realm, $item) {
        return sprintf(
                BLIZZARD_D3_ITEM_API_URL,
                $realm,
                str_replace('item/', '', $item));
    }
    
}
