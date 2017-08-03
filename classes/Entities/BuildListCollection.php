<?php

namespace Entities;

class BuildListCollection {

    private $items;
    private $gems;
    private $activeSkills;
    private $passiveSkills;
    private $cube;
























    public function getItems() {
        return $this->items;
    }

    public function getItemsByKey($key) {
        return $this->items[$key];
    }

    public function getGems() {
        return $this->gems;
    }

    public function getActiveSkills() {
        return $this->activeSkills;
    }

    public function getPassiveSkills() {
        return $this->passiveSkills;
    }

    public function setItems($items) {
        $this->items = $items;
        return $this;
    }

    public function setGems($gems) {
        $this->gems = $gems;
        return $this;
    }

    public function setActiveSkills($activeSkills) {
        $this->activeSkills = $activeSkills;
        return $this;
    }

    public function setPassiveSkills($passiveSkills) {
        $this->passiveSkills = $passiveSkills;
        return $this;
    }
    
    public function getCube() {
        return $this->cube;
    }

    public function getCubeByKey($key) {
        return $this->cube[$key];
    }

    public function setCube($cube) {
        $this->cube = $cube;
        return $this;
    }

}
