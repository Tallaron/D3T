<?php

namespace Entities;

class ImportItem {
    
    private $slug;
    private $name;
    private $icon;
    private $level;
    private $quality;
    private $type;















    public function getSlug() {
        return $this->slug;
    }

    public function getName() {
        return $this->name;
    }

    public function getIcon() {
        return $this->icon;
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

    public function getLevel() {
        return $this->level;
    }

    public function getQuality() {
        return $this->quality;
    }

    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    public function setQuality($quality) {
        $this->quality = $quality;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

}
