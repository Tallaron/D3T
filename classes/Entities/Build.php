<?php

namespace Entities;

class Build {
    
    //META
    private $id;
    private $class;
    private $name;
    private $version;
    //DETAILS
    private $inventory;
    private $cube;
    private $passiveSkills;
    private $activeSkills;
    private $runeLists = [];
    
    /**
     * Returns an array of \Entities\Rune from <b>$runeLists</b> by the given
     * <b>$index</b>.
     * @param int $index
     * @return array
     */
    public function getRuneList($index) {
        return $this->runeLists[$index];
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
     * @return int
     */
    public function getClass() {
        return $this->class;
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
    public function getVersion() {
        return $this->version;
    }

    /**
     * 
     * @param int $id
     * @return \Entities\Build
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param \Entities\HeroClass $class
     * @return \Entities\Build
     */
    public function setClass(\Entities\HeroClass $class) {
        $this->class = $class;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\Build
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $version
     * @return \Entities\Build
     */
    public function setVersion($version) {
        $this->version = $version;
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
     * @return \Entities\SkillSet
     */
    public function getPassiveSkills() {
        return $this->passiveSkills;
    }

    /**
     * 
     * @return \Entities\SkillSet
     */
    public function getActiveSkills() {
        return $this->activeSkills;
    }

    /**
     * 
     * @param \Entities\Cube $cube
     * @return \Entities\Build
     */
    public function setCube(\Entities\Cube $cube) {
        $this->cube = $cube;
        return $this;
    }

    /**
     * 
     * @param \Entities\SkillSet $passiveSkills
     * @return \Entities\Build
     */
    public function setPassiveSkills(\Entities\SkillSet $passiveSkills) {
        $this->passiveSkills = $passiveSkills;
        return $this;
    }

    /**
     * 
     * @param \Entities\SkillSet $activeSkills
     * @return \Entities\Build
     */
    public function setActiveSkills(\Entities\SkillSet $activeSkills) {
        $this->activeSkills = $activeSkills;
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
     * @return \Entities\Build
     */
    public function setInventory(\Entities\Inventory $inventory) {
        $this->inventory = $inventory;
        return $this;
    }
    
    /**
     * Returns the lists of runes according to the skills of the current build.
     * @return array
     */
    public function getRuneLists() {
        return $this->runeLists;
    }
    
    /**
     * Sets the rune lists for that build.
     * @param array $runeLists
     * @return \Entities\Build
     */
    public function setRuneLists($runeLists) {
        $this->runeLists = $runeLists;
        return $this;
    }

}
