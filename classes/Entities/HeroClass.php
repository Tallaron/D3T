<?php

namespace Entities;

class HeroClass {

    private $id;
    private $key;
    private $name;
    
    public function getId() {
        return $this->id;
    }

    public function getKey() {
        return $this->key;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setKey($key) {
        $this->key = $key;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    
}
