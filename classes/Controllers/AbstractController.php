<?php

namespace Controllers;

abstract class AbstractController {
    
    protected static $em;
    protected static $settings;
    protected $context = array();


    public static function setEntityManager($em) {
        self::$em = $em;
    }
    
    public static function setSettings($settings) {
        self::$settings = $settings;
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
