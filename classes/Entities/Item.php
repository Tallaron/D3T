<?php

namespace Entities;

class Item {

    private $id = 0;
    private $name = 'EMPTY';
    private $icon = false;
    private $displayColor = 'white';
    private $tooltipParams = '';
    private $sockets = 0;
    private $gems = [];




    public function getLargeIconUrl() {
        return BLIZZARD_D3_ITEM_BASE_PATH . 'large/' . strtolower($this->getIcon()) . '.png';
    }

    public function getSmallIconUrl() {
        return BLIZZARD_D3_ITEM_BASE_PATH . 'small/' . strtolower($this->getIcon()) . '.png';
    }

    

    public function addGem($gem) {
        $this->gems[] = $gem;
    }
    
    public function getGemAt($index) {
        return array_key_exists($index, $this->getGems()) ? $this->gems[$index] : new \Entities\Item();
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
    
    public function getGems() {
        return $this->gems;
    }

    public function setGems($gems) {
        $this->gems = $gems;
        return $this;
    }

    public function getSockets() {
        return $this->sockets;
    }

    public function setSockets($sockets) {
        $this->sockets = $sockets;
        return $this;
    }


    
}
