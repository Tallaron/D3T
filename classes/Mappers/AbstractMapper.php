<?php

namespace Mappers;

abstract class AbstractMapper {

    private static $token;
    private static $apiKey;
    private static $settings;
    
    
    /**
     * 
     * @param String $token
     */
    public static function setToken($token) {
        self::$token = $token;
    }
    
    /**
     * 
     * @return String
     */
    public static function getToken() {
        return self::$token;
    }
    
    /**
     * 
     * @return String
     */
    public static function getApiKey() {
        return self::$apiKey;
    }

    /**
     * 
     * @param String $apiKey
     */
    public static function setApiKey($apiKey) {
        self::$apiKey = $apiKey;
    }
    
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

    /**
     * Returns API data. If $obj is true return type is object, if not an
     * associative array will be returned.
     * @param String $api
     * @param boolean $obj
     * @return mixed
     */
    protected static function getApiDataWithToken($api, $obj = false) {
        $concat = substr_count($api, "?") > 0 ? '&' : '?';
        return json_decode(file_get_contents($api.$concat.'access_token='.self::getToken()), !$obj);
    }

    /**
     * Returns API data. If $obj is true return type is object, if not an
     * associative array will be returned.
     * @param String $api
     * @param boolean $obj
     * @return mixed
     */
    protected static function getApiDataWithKey($api, $obj = false) {
        $concat = substr_count($api, "?") > 0 ? '&' : '?';
        return json_decode(file_get_contents($api.$concat.'apikey='.self::getApiKey()), !$obj);
    }
    
}
