<?php

namespace Entities;

/**
 * Data class for Diablo 3 hero, containing some information about the hero and
 * containers for sub data structures like skills or items
 */
class Hero {

    private $id;
    private $name;
    private $class;
    private $gender;
    private $level;
    private $eliteKills;
    private $seasonal = false;
    private $hardcore = false;
    private $activeSkills = [null, null, null, null, null, null];
    private $passiveSkills = [null, null, null, null];
    private $inventory;
    private $cube;

    /**
     * returns Blizzard cdn image url for large icon
     * @return String
     */
    public function getLargeIconUrl() {
        return BLIZZARD_D3_PORTRAIT_BASE_PATH . '42/' . $this->getIconFileName() . '.png';
    }

    /**
     * returns Blizzard cdn image url for small icon
     * @return String
     */
    public function getSmallIconUrl() {
        return BLIZZARD_D3_PORTRAIT_BASE_PATH . '21/' . $this->getIconFileName() . '.png';
    }

    /**
     * Puts an ActiveSkill object at the possition given by the index
     * @param \Entities\ActiveSkill $skill \Entities\ActiveSkill or null
     * @param int $index
     */
    public function addActiveSkill($skill, $index) {
        $this->activeSkills[$index] = $skill;
    }
    
    /**
     * Puts an PassiveSkill object at the possition given by the index
     * @param \Entities\PassiveSkill $skill \Entities\PassiveSkill or null
     * @param type $index
     */
    public function addPassiveSkill($skill, $index) {
        $this->passiveSkills[$index] = $skill;
    }
    
    /**
     * Returns the image string for the paper dolls background according
     * to the heroes class.
     * @return String
     */
    public function getPaperDoll() {
        return $this->getClass().'-'.$this->getGender();
    }

    /**
     * Generated the hero icon's filename based on its class and gender flag.
     * @return String
     */
    private function getIconFileName() {
        return strtolower($this->getClass()).'-'.$this->getGender()?'female':'male';
    }
    
    /**
     * 
     * @return boolean
     */
    public function isSeasonal() {
        return $this->getSeasonal();
    }
    
    /**
     * 
     * @return boolean
     */
    public function isHardcore() {
        return $this->getHardcore();
    }

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
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @return String
     */
    public function getClass() {
        return $this->class;
    }

    /**
     * 
     * @return int
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Returns the non paragon level of the hero
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * 
     * @return int
     */
    public function getEliteKills() {
        return $this->eliteKills;
    }

    /**
     * 
     * Returns true if the hero is a seasonal hero or false if not. Defaults false.
     * @return boolean
     */
    public function getSeasonal() {
        return $this->seasonal;
    }

    /**
     * 
     * Returns true if the hero is a hardcore hero or false if not. Defaults false.
     * @return boolean
     */
    public function getHardcore() {
        return $this->hardcore;
    }

    /**
     * 
     * @param int $id
     * @return \Entities\Hero
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\Hero
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $class
     * @return \Entities\Hero
     */
    public function setClass($class) {
        $this->class = $class;
        return $this;
    }

    /**
     * 
     * @param int $gender
     * @return \Entities\Hero
     */
    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    /**
     * 
     * @param int $level
     * @return \Entities\Hero
     */
    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    /**
     * 
     * @param int $eliteKills
     * @return \Entities\Hero
     */
    public function setEliteKills($eliteKills) {
        $this->eliteKills = $eliteKills;
        return $this;
    }

    /**
     * 
     * @param boolean $seasonal
     * @return \Entities\Hero
     */
    public function setSeasonal($seasonal) {
        $this->seasonal = $seasonal;
        return $this;
    }

    /**
     * 
     * @param boolean $hardcore
     * @return \Entities\Hero
     */
    public function setHardcore($hardcore) {
        $this->hardcore = $hardcore;
        return $this;
    }

    /**
     * 
     * @return array Returns an array of \Entities\ActiveSkill. The array has
     * a size of at least 6 and is defaulted with null values.
     */
    public function getActiveSkills() {
        return $this->activeSkills;
    }

    /**
     * 
     * @return array Returns an array of \Entities\PassiveSkill. The array has
     * a size of at least 4 and is defaulted with null values.
     */
    public function getPassiveSkills() {
        return $this->passiveSkills;
    }

    /**
     * 
     * @param array $activeSkills Array of \Entities\ActiveSkill (or null)
     * @return \Entities\Hero
     */
    public function setActiveSkills(array $activeSkills) {
        $this->activeSkills = $activeSkills;
        return $this;
    }

    /**
     * 
     * @param array $passiveSkills Array of \Entities\PassiveSkill (or null)
     * @return \Entities\Hero
     */
    public function setPassiveSkills(array $passiveSkills) {
        $this->passiveSkills = $passiveSkills;
        return $this;
    }

    /**
     * 
     * @return \Entities\Inventory
     */
    public function getInventory() {
        return $this->inventory;
    }

    /**
     * 
     * @param \Entities\Inventory $inventory
     * @return \Entities\Hero
     */
    public function setInventory(\Entities\Inventory $inventory) {
        $this->inventory = $inventory;
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
     * 
     * @param \Entities\Cube $cube
     * @return \Entities\Hero
     */
    public function setCube(\Entities\Cube $cube) {
        $this->cube = $cube;
        return $this;
    }

}
