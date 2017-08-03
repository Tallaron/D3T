<?php

namespace Entities;

class ImportRune {
    
    private $skillId;
    private $slug;
    private $name;
    private $type;
    private $level;




    public function getSlug() {
        return $this->slug;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
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

    public function getSkillId() {
        return $this->skillId;
    }

    public function setSkillId($skillId) {
        $this->skillId = $skillId;
        return $this;
    }

    public function getLevel() {
        return $this->level;
    }

    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }




}