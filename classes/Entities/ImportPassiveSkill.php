<?php

namespace Entities;

class ImportPassiveSkill extends AbstractSkill {
    
    private $id;
    private $slug;
    private $name;
    private $icon; //filename w/o extention and path
    private $heroClass;

    public function getHeroClass() {
        return $this->heroClass;
    }

    public function setHeroClass($heroClass) {
        $this->heroClass = $heroClass;
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
