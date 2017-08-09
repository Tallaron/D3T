<?php

namespace Entities;

class Build {
    
    //META
    private $id;
    private $classId;
    private $name;
    private $version;
    //DETAILS
    private $inventory;
    private $cube;
    private $passiveSkills;
    private $activeSkills;

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
    public function getClassId() {
        return $this->classId;
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
     * @param int $classId
     * @return \Entities\Build
     */
    public function setClassId($classId) {
        $this->classId = $classId;
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
    
}
