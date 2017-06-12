<?php

namespace Controllers;

class Settings {

    private $context = array();
    
    public function addContext($k, $v) {
        $this->context[$k] = $v;
        return $this;
    }
    
    public function getContext() {
        return $this->context;
    }
    
    public function get($k, $sub = false) {
        if($sub) {
//            echo $sub;
            return $this->context[$k][$sub];
        } else {
            return $this->context[$k];
        }
    }
    
    
    
}
