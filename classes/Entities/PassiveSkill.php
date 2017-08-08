<?php

namespace Entities;

/**
 * Data class for Diablo 3 passive skill, e.g. 'Nerves of Steel'
 */
class PassiveSkill extends AbstractSkill {

    private $id;
    private $slug;
    private $name;
    private $icon; //filename w/o extention and path
    private $tooltipUrl;
    private $description;
    
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
     * @return \Entities\*Skill
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\*Skill
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $icon
     * @return \Entities\*Skill
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
     * @return \Entities\*Skill
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
}
