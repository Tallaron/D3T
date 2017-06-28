<?php

namespace Entities;

class Item {

    private $id;
    private $name;
    private $icon;
    private $displayColor;
    private $tooltipParams;
    
    
    
    
    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function getDisplayColor() {
        return $this->displayColor;
    }

    public function getTooltipParams() {
        return $this->tooltipParams;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function setDisplayColor($displayColor) {
        $this->displayColor = $displayColor;
        return $this;
    }

    public function setTooltipParams($tooltipParams) {
        $this->tooltipParams = $tooltipParams;
        return $this;
    }


    
}
