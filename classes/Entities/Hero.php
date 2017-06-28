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
    private $activeSkills = [];
    private $passiveSkills = [];
    private $inventory;



    public function addActiveSkill($skill) {
        $this->activeSkills[] = $skill;
    }
    
    public function addPassiveSkill($skill) {
        $this->passiveSkills[] = $skill;
    }

    

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

    public function getActiveSkills() {
        return $this->activeSkills;
    }

    public function getPassiveSkills() {
        return $this->passiveSkills;
    }

    public function setActiveSkills($activeSkills) {
        $this->activeSkills = $activeSkills;
        return $this;
    }

    public function setPassiveSkills($passiveSkills) {
        $this->passiveSkills = $passiveSkills;
        return $this;
    }

    public function getInventory() {
        return $this->inventory;
    }

    public function setInventory($inventory) {
        $this->inventory = $inventory;
        return $this;
    }



    
    
}
