<?php

namespace Controllers;

abstract class AbstractController {
    
    private static $em; //not used at this moment
    private static $settings;
    private $context = array();


    public static function setEntityManager($em) {
        self::$em = $em;
    }
    
    public static function setSettings($settings) {
        self::$settings = $settings;
    }
    
    public static function getEm() {
        return self::$em;
    }

    public static function getSettings() {
        return self::$settings;
    }

    public function redirect($location = 'home') {
        header('Location: '.BASE_DIR.'/'.$location);
        exit;
    }
    
    public function addContext($k, $v) {
        $this->context[$k] = $v;
    }
    
    public function getContext() {
        return $this->context;
    }
    
}
