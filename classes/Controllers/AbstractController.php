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
    
    public static function getMsg() {
        $msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : false;
        unset($_SESSION['msg']);
        return $msg;
    }

    public static function setMsg(array $msg) {
        $_SESSION['msg'] = $msg;
    }

    public static function addMsg($msg) {
        if(isset($_SESSION['msg']) && !is_array($_SESSION['msg'])) {
            $_SESSION['msg'] = [];
        }
        $_SESSION['msg'][] = $msg;
    }

    
}
