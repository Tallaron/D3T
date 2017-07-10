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
     * @param int $lifeTime The lifetime of the cache. If 0 nothing will be cached.
     * @return mixed
     */
    protected static function getApiDataWithToken($api, $obj = false, $lifeTime = SYS_DEFAULT_CACHE_LIFETIME) {
        $concat = substr_count($api, "?") > 0 ? '&' : '?';
        return json_decode( self::getDataFromCache( $api.$concat.'access_token='.self::getToken(), $lifeTime ), !$obj );
    }

    /**
     * Returns API data. If $obj is true return type is object, if not an
     * associative array will be returned.
     * @param String $api
     * @param boolean $obj
     * @param int $lifeTime The lifetime of the cache. If 0 nothing will be cached.
     * @return mixed
     */
    protected static function getApiDataWithKey($api, $obj = false, $lifeTime = SYS_DEFAULT_CACHE_LIFETIME) {
        $concat = substr_count($api, "?") > 0 ? '&' : '?';
        return json_decode( self::getDataFromCache( $api.$concat.'apikey='.self::getApiKey(), $lifeTime ), !$obj );
    }
    
    /**
     * Checks if a cache file for the given data source exists or not. If not,
     * creates the file and puts the content into the file. Also overrides the
     * content, if the life time was expired.
     * Uses the destination given by DEFAULT_CACHE_DIR for storaging the
     * cache files.
     * Note: The file names are md5 hash values representing the data source.
     * There is no fallback if md5 returns the same hash for different sources!
     * @param String $source Path to the data. Must compatible to file_get_contents()
     * @return String The read data from the cache file
     */
    protected static function getDataFromCache($source, $lifeTime = SYS_DEFAULT_CACHE_LIFETIME) {
        $file = DEFAULT_CACHE_DIR . '/' . md5($source) . '.dat';
        if(!file_exists($file) || time()-filemtime($file) > max(0, $lifeTime)) {
            file_put_contents($file, file_get_contents($source));
        }
        return file_get_contents($file);
    }

}
