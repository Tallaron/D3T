<?php

namespace Entities;

class Cube {

    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    

    public function getItems() {
        return $this->items;
    }

    public function setItems($items) {
        $this->items = $items;
        return $this;
    }


    
    

    
}
