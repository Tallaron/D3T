<?php

namespace Entities;

class PasiveSkill {

    private $slug;
    private $name;
    private $icon;
    private $tooltipUrl;
    private $description;
    
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

}
