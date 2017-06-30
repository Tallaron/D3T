<?php

namespace Entities;

class Gem {

    private $id = 0;
    private $name = 'EMPTY';
    private $icon = false;
    private $displayColor = 'white';
    private $tooltipParams = '';


    public function getLargeIconUrl() {
        return BLIZZARD_D3_ITEM_BASE_PATH . 'large/' . strtolower($this->getIcon()) . '.png';
    }

    public function getSmallIconUrl() {
        return BLIZZARD_D3_ITEM_BASE_PATH . 'small/' . strtolower($this->getIcon()) . '.png';
    }

    

    
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
