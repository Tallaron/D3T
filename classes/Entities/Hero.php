<?php

namespace Entities;

class Hero {

    private $id;
    private $name;
    private $class;
    private $gender;
    private $level;
    private $eliteKills;
    private $seasonal;
    private $hardcore;
    
    
    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getClass() {
        return $this->class;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getEliteKills() {
        return $this->eliteKills;
    }

    public function getSeasonal() {
        return $this->seasonal;
    }

    public function getHardcore() {
        return $this->hardcore;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setClass($class) {
        $this->class = $class;
        return $this;
    }

    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    public function setEliteKills($eliteKills) {
        $this->eliteKills = $eliteKills;
        return $this;
    }

    public function setSeasonal($seasonal) {
        $this->seasonal = $seasonal;
        return $this;
    }

    public function setHardcore($hardcore) {
        $this->hardcore = $hardcore;
        return $this;
    }


    
    
}
