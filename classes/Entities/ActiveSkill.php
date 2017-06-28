<?php

namespace Entities;

class ActiveSkill {

    private $slug;
    private $name;
    private $icon;
    private $tooltipUrl;
    private $description;
    private $simpleDescription;
    
    private $rune = null;
    
    public function getSlug() {
        return $this->slug;
    }

    public function getName() {
        return $this->name;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function getTooltipUrl() {
        return $this->tooltipUrl;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getSimpleDescription() {
        return $this->simpleDescription;
    }

    public function getRune() {
        return $this->rune;
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

    public function setTooltipUrl($tooltipUrl) {
        $this->tooltipUrl = $tooltipUrl;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setSimpleDescription($simpleDescription) {
        $this->simpleDescription = $simpleDescription;
        return $this;
    }

    public function setRune($rune) {
        $this->rune = $rune;
        return $this;
    }

}
