<?php

namespace Entities;

class Rune {

    private $slug;
    private $name;
    private $description;
    private $simpleDescription;
    private $tooltipParams;
    
    public function getSlug() {
        return $this->slug;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getSimpleDescription() {
        return $this->simpleDescription;
    }

    public function getTooltipParams() {
        return $this->tooltipParams;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
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

    public function setTooltipParams($tooltipParams) {
        $this->tooltipParams = $tooltipParams;
        return $this;
    }

}
