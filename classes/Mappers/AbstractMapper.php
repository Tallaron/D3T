<?php

namespace Mappers;

abstract class AbstractMapper {

    private static $token;
    
    public static function setToken($token) {
        self::$token = $token;
    }
    
    public static function getToken() {
        return self::$token;
    }
    
    
    
    protected static function getApiJson($api) {
        if(substr_count($api, "?") > 0) {
            return json_decode(file_get_contents($api.'&access_token='.self::getToken()), true);
        } else {
            return json_decode(file_get_contents($api.'?access_token='.self::getToken()), true);
        }
    }

    
    
    
    
}
