<?php

namespace Entities;

class ImportActiveSkill {
    
    private $id;
    private $heroClass;
    private $slug;
    private $name;
    private $icon;
    private $runes = [];
    
    
    
    
    
    
    
    public function addRune($rune) {
        $this->runes[] = $rune;
    }

    

    public function getHeroClass() {
        return $this->heroClass;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getName() {
        return $this->name;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function getRunes() {
        return $this->runes;
    }

    public function setHeroClass($heroClass) {
        $this->heroClass = $heroClass;
        return $this;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
        return $this;
    }

    public function setRunes($runes) {
        $this->runes = $runes;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        foreach($this->getRunes() as $rune) {
            $rune->setSkillId($id);
        }
        return $this;
    }

}
