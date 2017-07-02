<?php

namespace Entities;

/**
 * Data class that holds up to three Item objects representing the currently
 * active legendary powers in the Cube
 */
class Cube {

    private $items = [];
    
    public function __construct() {
        for($i = 0; $i<3; $i++) { // Prefills the item array with default Items
            $this->items[$i] = new \Entities\Item();
        }
    }

    /**
     * 
     * @param \Entities\Item $item
     * @param int $i
     */
    public function addItem(\Entities\Item $item, $i) {
        $this->items[$i] = $item;
    }

    /**
     * 
     * @param int $index
     * @return \Entity\Item
     */
    public function getItemAt($index) {
        return $this->items[$index];
    }

    /**
     * 
     * @return array Returns an array of \Entities\Item
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * 
     * @param array $items Awaits an array of \Entities\Item or null's
     * @return \Entities\Cube
     */
    public function setItems(array $items) {
        $valid = true;
        foreach($items as $item) {
            if($item == null || !$item instanceof \Entities\Item) {
                $valid = false;
            }
        }
        if($valid) {
            $this->items = $items;
        }
        return $this;
    }


    
    

    
}
