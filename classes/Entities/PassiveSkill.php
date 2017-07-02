<?php

namespace Entities;

/**
 * Data class for Diablo 3 passive skill, e.g. 'Nerves of Steel'
 */
class PassiveSkill {

    private $slug;
    private $name = 'EMPTY';
    private $icon;
    private $tooltipUrl;
    private $description;
    
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
     * @param String $slug
     * @return \Entities\PassiveSkill
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\PassiveSkill
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $icon
     * @return \Entities\PassiveSkill
     */
    public function setIcon($icon) {
        $this->icon = $icon;
        return $this;
    }

    /**
     * 
     * @param String $tooltipUrl
     * @return \Entities\PassiveSkill
     */
    public function setTooltipUrl($tooltipUrl) {
        $this->tooltipUrl = $tooltipUrl;
        return $this;
    }

    /**
     * 
     * @param String $description
     * @return \Entities\PassiveSkill
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

}
