<?php

namespace Entities;

class BuildListCollection {

    private $items;
    private $gems;
    private $activeSkills;
    private $passiveSkills;
    private $cube;

    /**
     * Returns an associative array of arrays of \Entities\Item
     * @return array
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * Returns an array of \Entities\Item or an empty array
     * @param mixed $key
     * @return array
     */
    public function getItemsByKey($key) {
        return array_key_exists($key, $this->items) ? $this->items[$key] : array();
    }

    /**
     * Returns an array of \Entities\Gem
     * @return array
     */
    public function getGems() {
        return $this->gems;
    }

    /**
     * Returns an array of \Entities\Skill
     * @return array
     */
    public function getActiveSkills() {
        return $this->activeSkills;
    }

    /**
     * Returns an array of \Entities\Skill
     * @return array
     */
    public function getPassiveSkills() {
        return $this->passiveSkills;
    }

    /**
     * 
     * @param array $items
     * @return \Entities\BuildListCollection
     */
    public function setItems($items) {
        $this->items = $items;
        return $this;
    }

    /**
     * 
     * @param array $gems
     * @return \Entities\BuildListCollection
     */
    public function setGems($gems) {
        $this->gems = $gems;
        return $this;
    }

    /**
     * 
     * @param array $activeSkills
     * @return \Entities\BuildListCollection
     */
    public function setActiveSkills($activeSkills) {
        $this->activeSkills = $activeSkills;
        return $this;
    }

    /**
     * 
     * @param array $passiveSkills
     * @return \Entities\BuildListCollection
     */
    public function setPassiveSkills($passiveSkills) {
        $this->passiveSkills = $passiveSkills;
        return $this;
    }
    
    /**
     * 
     * @return \Entities\Cube
     */
    public function getCube() {
        return $this->cube;
    }

    /**
     * Returns an array of \Entities\Item or an empty array
     * @param mixed $key
     * @return array
     */
    public function getCubeItemsByKey($key) {
        return array_key_exists($key, $this->cube) ? $this->cube[$key] : array();
    }

    /**
     * 
     * @param array $cube
     * @return \Entities\BuildListCollection
     */
    public function setCube($cube) {
        $this->cube = $cube;
        return $this;
    }

}
