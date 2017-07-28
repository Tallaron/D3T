<?php

namespace Entities;

class ImportRune {
    
    private $skill;
    private $slug;
    private $name;
    private $type;
    


    public function getSkill() {
        return $this->skill;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function setSkill($skill) {
        $this->skill = $skill;
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

    public function setType($type) {
        $this->type = $type;
        return $this;
    }


}
