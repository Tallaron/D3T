<?php

namespace Entities;

class Build {
    
    //META
    private $id;
    private $class;
    private $name;
    private $version;
    private $published;
    private $scopeSolo;
    private $scopeTeam;
    //DETAILS
    private $inventory;
    private $cube;
    private $passiveSkills;
    private $activeSkills;
    private $runeLists = [];
    
    /**
     * Returns the value of a specified scope, indentified by <b>$group</b> and
     * <b>$key</b>. If the method cannot find a valid end point it will return false.
     * @param String $group e.g. 'solo'
     * @param String $key e.g. 'bounty'
     * @return mixed
     */
    public function getScope($group, $key) {
        $method = 'getScope'.ucfirst($group);
        if(method_exists($this, $method)) {
            return $this->$method()->get($key);
        } return false;
    }

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
    
    /**
     * 
     * @return \Entities\ScopeList
     */
    public function getScopeSolo() {
        return $this->scopeSolo == null ? new \Entities\ScopeList() : $this->scopeSolo;
    }

    /**
     * 
     * @return \Entities\ScopeList
     */
    public function getScopeTeam() {
        return $this->scopeTeam == null ? new \Entities\ScopeList() : $this->scopeTeam;
    }

    /**
     * 
     * @param \Entities\ScopeList $scopeSolo
     * @return \Entities\Build
     */
    public function setScopeSolo(\Entities\ScopeList $scopeSolo) {
        $this->scopeSolo = $scopeSolo;
        return $this;
    }

    /**
     * 
     * @param \Entities\ScopeList $scopeTeam
     * @return \Entities\Build
     */
    public function setScopeTeam(\Entities\ScopeList $scopeTeam) {
        $this->scopeTeam = $scopeTeam;
        return $this;
    }

    /**
     * 0 (default) - Not published
     * 1           - Published
     * @return int
     */
    public function getPublished() {
        return $this->published;
    }

    /**
     * 0 - Not published
     * 1 - Published
     * @param int $published
     * @return \Entities\Build
     */
    public function setPublished($published) {
        $this->published = $published;
        return $this;
    }

}
