<?php

namespace Views;

class View {
    
    private static $instance;
    private $smarty;


    private function __construct() {
        $this->smarty = new \Smarty();
            $this->smarty->setTemplateDir(SMARTY_TPL_DIR);
            $this->smarty->setCompileDir(SMARTY_COMP_DIR);
            $this->smarty->setCacheDir(SMARTY_CACHE_DIR);
            $this->smarty->setCacheLifetime(SMARTY_CACHE_LIFETIME);
            $this->smarty->setCaching(SMARTY_CACHE);
    }
    
    private function __clone() {}
    
    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new \Views\View();
        }
        return self::$instance->smarty;
    }
    
}
