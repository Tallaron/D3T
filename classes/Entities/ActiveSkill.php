<?php

namespace Entities;

/**
 * Data class for Diablo 3 active skill, e.g. 'Furious Charge'
 */
class ActiveSkill {

    private $slug;
    private $name;
    private $icon; //filename w/o extention and path
    private $tooltipUrl;
    private $description;
    private $simpleDescription;
    private $rune;
    
    /**
     * returns Blizzard cdn image url for large icon
     * @return String
     */
    public function getLargeIconUrl() {
        return BLIZZARD_D3_SKILL_BASE_PATH . '42/' . strtolower($this->getIcon()) . '.png';
    }

    /**
     * returns Blizzard cdn image url for small icon
     * @return String
     */
    public function getSmallIconUrl() {
        return BLIZZARD_D3_SKILL_BASE_PATH . '21/' . strtolower($this->getIcon()) . '.png';
    }
    
    /**
     * 
     * @return String Returns String or null
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * 
     * @return String Returns String or null
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @return String Returns String or null
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * 
     * @return String Returns String or null
     */
    public function getTooltipUrl() {
        return $this->tooltipUrl;
    }

    /**
     * 
     * @return String Returns String or null
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * 
     * @return String Returns String or null
     */
    public function getSimpleDescription() {
        return $this->simpleDescription;
    }

    /**
     * 
     * @return \Entities\Rune Returns \Entities\Rune or null
     */
    public function getRune() {
        return $this->rune;
    }

    /**
     * 
     * @param String $slug
     * @return \Entities\ActiveSkill
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\ActiveSkill
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $icon
     * @return \Entities\ActiveSkill
     */
    public function setIcon($icon) {
        $this->icon = $icon;
        return $this;
    }

    /**
     * 
     * @param String $tooltipUrl
     * @return \Entities\ActiveSkill
     */
    public function setTooltipUrl($tooltipUrl) {
        $this->tooltipUrl = $tooltipUrl;
        return $this;
    }

    /**
     * 
     * @param String $description
     * @return \Entities\ActiveSkill
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * 
     * @param String $simpleDescription
     * @return \Entities\ActiveSkill
     */
    public function setSimpleDescription($simpleDescription) {
        $this->simpleDescription = $simpleDescription;
        return $this;
    }

    /**
     * 
     * @param \Entities\Rune $rune
     * @return \Entities\ActiveSkill
     */
    public function setRune(\Entities\Rune $rune) {
        $this->rune = $rune;
        return $this;
    }

}
