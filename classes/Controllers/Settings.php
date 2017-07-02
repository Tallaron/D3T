<?php

namespace Controllers;

/**
 * Collection of project settings
 * incl. associative arrays
 */
class Settings {

    private $context = [];
    
    /**
     * 
     * @param String $k Setting name
     * @param mixed $v Setting value (no restriction to types)
     * @return \Controllers\Settings
     */
    public function addContext($k, $v) {
        $this->context[$k] = $v;
        return $this;
    }
    
    /**
     * Returns the whole key-value-array
     * @return array
     */
    public function getContext() {
        return $this->context;
    }
    
    /**
     * Returns the value of the 1st level by accessing the key element and its
     * value. If there is a second parameter the value of the 2nd level is
     * returned.
     * @param String $k Setting name
     * @param mixed $sub String or int to access the value in the 2nd level
     * of the context array
     * @return mixed
     */
    public function get($k, $sub = false) {
        if($sub !== false) {
            return $this->context[$k][$sub];
        } else {
            return $this->context[$k];
        }
    }
    
}
