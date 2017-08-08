<?php

namespace Entities;

class Build {
    
    private $id;
    private $classId;
    private $name;
    private $version;
    private $items;
    private $cube;
    private $passiveSkills;
    private $activeSkills;
    private $runeLists;

    public function getRuneList($index) {
        return $this->runeLists[$index];
    }

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
    
    public function getItems() {
        return $this->items;
    }

    public function getCube() {
        return $this->cube;
    }

    public function getPassiveSkills() {
        return $this->passiveSkills;
    }

    public function getActiveSkills() {
        return $this->activeSkills;
    }

    public function getRuneLists() {
        return $this->runeLists;
    }

    public function setItems($items) {
        $this->items = $items;
        return $this;
    }

    public function setCube($cube) {
        $this->cube = $cube;
        return $this;
    }

    public function setPassiveSkills($passiveSkills) {
        $this->passiveSkills = $passiveSkills;
        return $this;
    }

    public function setActiveSkills($activeSkills) {
        $this->activeSkills = $activeSkills;
        return $this;
    }

    public function setRuneLists($runeLists) {
        $this->runeLists = $runeLists;
        return $this;
    }


    
}
