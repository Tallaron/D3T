<?php

namespace Entities;

class EditorItem {

    private $itemId = -1;
    private $gems = [];
    
    public function __construct($itemId) {
        $this->itemId = $itemId;
    }

    public function addGem($gem, $index) {
        $this->gems[$index] = $gem;
    }
    
    public function getGemAt($index) {
        return $this->gems[$index];
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
