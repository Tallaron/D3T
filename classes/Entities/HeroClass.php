<?php

namespace Entities;

class HeroClass {

    private $id;
    private $key;
    private $name;

    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @return String
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * 
     * @return String
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @param int $id
     * @return \Entities\HeroClass
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param String $key
     * @return \Entities\HeroClass
     */
    public function setKey($key) {
        $this->key = $key;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\HeroClass
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    
}
