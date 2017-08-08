<?php

namespace Entities;

class ImportActiveSkill extends AbstractSkill {
    
    private $id;
    private $slug;
    private $name;
    private $icon; //filename w/o extention and path
    private $heroClass;
    private $runes = [];
    
    public function addRune($rune) {
        $this->runes[] = $rune;
    }

    public function getHeroClass() {
        return $this->heroClass;
    }

    public function getRunes() {
        return $this->runes;
    }

    public function setHeroClass($heroClass) {
        $this->heroClass = $heroClass;
        return $this;
    }

    public function setRunes($runes) {
        $this->runes = $runes;
        return $this;
    }

    public function setId($id) {
        $this->id = $id;
        foreach($this->getRunes() as $rune) {
            $rune->setSkillId($id);
        }
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

}
