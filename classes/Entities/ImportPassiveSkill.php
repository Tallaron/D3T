<?php

namespace Entities;

class ImportPassiveSkill {
    
    private $heroClass;
    private $slug;
    private $name;
    private $icon;
    
    
    

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


    
}
