<?php

namespace Mappers;

abstract class AbstractMapper {

    private static $token;
    private static $apiKey;
    private static $settings;
    
    public static function setToken($token) {
        self::$token = $token;
    }
    
    public static function getToken() {
        return self::$token;
    }
    
    public static function getApiKey() {
        return self::$apiKey;
    }

    public static function setApiKey($apiKey) {
        self::$apiKey = $apiKey;
    }
    
    public static function getSettings() {
        return self::$settings;
    }

    public static function setSettings($settings) {
        self::$settings = $settings;
    }

    
        
    protected static function getApiArrayWithToken($api) {
        if(substr_count($api, "?") > 0) {
            return json_decode(file_get_contents($api.'&access_token='.self::getToken()), true);
        } else {
            return json_decode(file_get_contents($api.'?access_token='.self::getToken()), true);
        }
    }

    protected static function getApiArrayWithKey($api) {
        if(substr_count($api, "?") > 0) {
            return json_decode(file_get_contents($api.'&apikey='.self::getApiKey()), true);
        } else {
            return json_decode(file_get_contents($api.'?apikey='.self::getApiKey()), true);
        }
    }

    protected static function getApiObjWithKey($api) {
        if(substr_count($api, "?") > 0) {
            return json_decode(file_get_contents($api.'&apikey='.self::getApiKey()), false);
        } else {
            return json_decode(file_get_contents($api.'?apikey='.self::getApiKey()), false);
        }
    }

    
    
    
    
}
