<?php

namespace Factories;

abstract class AbstractFactory {

    private static $settings;
    
    /**
     * 
     * @return \Controllers\Settings
     */
    public static function getSettings() {
        return self::$settings;
    }

    /**
     * 
     * @param \Controllers\Settings $settings
     */
    public static function setSettings(\Controllers\Settings $settings) {
        self::$settings = $settings;
    }
    
}
