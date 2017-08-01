<?php

namespace Entities;

class Build {
    
    private $id;
    private $classId;
    private $name;
    private $version;
    private $hero;


    public function getId() {
        return $this->id;
    }

    public function getClassId() {
        return $this->classId;
    }

    public function getName() {
        return $this->name;
    }

    public function getVersion() {
        return $this->version;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setClassId($classId) {
        $this->classId = $classId;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setVersion($version) {
        $this->version = $version;
        return $this;
    }
    
    public function getHero() {
        return $this->hero;
    }

    public function setHero($hero) {
        $this->hero = $hero;
        return $this;
    }

}
