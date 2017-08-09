<?php

namespace Entities;

class Skill {

    private $id;
    private $slug;
    private $name;
    private $icon; //filename w/o extention and path
    private $tooltipUrl;
    private $description;
    private $simpleDescription;
    private $rune;
    private $index;
    private $heroClass;
    private $runes = [];

    /**
     * 
     * @param \Entities\Rune $rune
     */
    public function addRune(\Entities\Rune $rune) {
        $this->runes[] = $rune;
    }

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
     * @param String $tooltipUrl
     * @return \Entities\Skill
     */
    public function setTooltipUrl($tooltipUrl) {
        $this->tooltipUrl = $tooltipUrl;
        return $this;
    }

    /**
     * 
     * @param String $description
     * @return \Entities\Skill
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * 
     * @param String $simpleDescription
     * @return \Entities\Skill
     */
    public function setSimpleDescription($simpleDescription) {
        $this->simpleDescription = $simpleDescription;
        return $this;
    }

    /**
     * 
     * @param \Entities\Rune $rune
     * @return \Entities\Skill
     */
    public function setRune(\Entities\Rune $rune) {
        $this->rune = $rune;
        return $this;
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
     * @param String $slug
     * @return \Entities\Skill
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\Skill
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $icon
     * @return \Entities\Skill
     */
    public function setIcon($icon) {
        $this->icon = $icon;
        return $this;
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
     * @param int $id
     * @return \Entities\Skill
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getIndex() {
        return $this->index;
    }

    /**
     * 
     * @param int $index
     * @return \Entities\Skill
     */
    public function setIndex($index) {
        $this->index = $index;
        return $this;
    }

    /**
     * 
     * @return \Entities\HeroClass
     */
    public function getHeroClass() {
        return $this->heroClass;
    }

    /**
     * Returns an array of \Entities\Rune.
     * @return array
     */
    public function getRunes() {
        return $this->runes;
    }

    /**
     * 
     * @param \Entities\HeroClass $heroClass
     * @return \Entities\Skill
     */
    public function setHeroClass(\Entities\HeroClass $heroClass) {
        $this->heroClass = $heroClass;
        return $this;
    }

    /**
     * Awaits an array of \Entities\Rune to put into <b>$this->runes</b>.
     * @param array $runes
     * @return \Entities\Skill
     */
    public function setRunes(array $runes) {
        $this->runes = $runes;
        return $this;
    }



    
}
