<?php

namespace Entities;

class EditorItem {

    private $itemId;
    private $gems = [];
    
    public function __construct($itemId = -1) {
        $this->itemId = $itemId;
    }

    public function addGem($gem, $index) {
        $this->gems[$index] = $gem;
    }
    
    public function getGemAt($index) {
        if(array_key_exists($index, $this->getGems())) {
            return $this->gems[$index];
        } return false;
    }

    public function getItemId() {
        return $this->itemId;
    }

    public function getGems() {
        return $this->gems;
    }

    public function setItemId($itemId) {
        $this->itemId = $itemId;
        return $this;
    }

    public function setGems($gems) {
        $this->gems = $gems;
        return $this;
    }


}
