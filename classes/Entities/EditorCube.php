<?php

namespace Entities;

class EditorCube {

    private $weapon = -1;
    private $armor = -1;
    private $jewelry = -1;
    
    public function getWeapon() {
        return $this->weapon;
    }

    public function getArmor() {
        return $this->armor;
    }

    public function getJewelry() {
        return $this->jewelry;
    }

    public function setWeapon($weapon) {
        $this->weapon = $weapon;
        return $this;
    }

    public function setArmor($armor) {
        $this->armor = $armor;
        return $this;
    }

    public function setJewelry($jewelry) {
        $this->jewelry = $jewelry;
        return $this;
    }
    
    public function get($key) {
        $method = 'get'. ucfirst($key);
        if(method_exists($this, $method)) {
            return $this->$method();
        } return -1;
    }

}
