<?php

namespace Entities;

/**
 * Data class for Diablo 3 skill rune. Only relevant for active skills.
 */
class Rune {

    private $id = -1;
    private $slug;
    private $name;
    private $description;
    private $simpleDescription;
    private $tooltipParams;
    private $type;
    private $skillId;
    private $level;

    /**
     * 
     * @return String
     */
    public function getSlug() {
        return $this->slug;
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
    public function getDescription() {
        return $this->description;
    }

    /**
     * 
     * @return String
     */
    public function getSimpleDescription() {
        return $this->simpleDescription;
    }

    /**
     * 
     * @return String
     */
    public function getTooltipParams() {
        return $this->tooltipParams;
    }

    /**
     * 
     * @param String $slug
     * @return \Entities\Rune
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\Rune
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $description
     * @return \Entities\Rune
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * 
     * @param String $simpleDescription
     * @return \Entities\Rune
     */
    public function setSimpleDescription($simpleDescription) {
        $this->simpleDescription = $simpleDescription;
        return $this;
    }

    /**
     * 
     * @param String $tooltipParams
     * @return \Entities\Rune
     */
    public function setTooltipParams($tooltipParams) {
        $this->tooltipParams = $tooltipParams;
        return $this;
    }

    /**
     * 
     * @return \Entities\Rune
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @param int $id
     * @return \Entities\Rune
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    /**
     * 
     * @return String
     */
    public function getType() {
        return $this->type;
    }

    /**
     * 
     * @param int $type
     * @return \Entities\Rune
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getSkillId() {
        return $this->skillId;
    }

    /**
     * 
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * 
     * @param int $skillId
     * @return \Entities\Rune
     */
    public function setSkillId($skillId) {
        $this->skillId = $skillId;
        return $this;
    }

    /**
     * 
     * @param int $level
     * @return \Entities\Rune
     */
    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

}
