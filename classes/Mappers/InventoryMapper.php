<?php

namespace Mappers;

class InventoryMapper {

    private $inventory;
    
    public function __construct($data) {
        $this->setInventory(new \Entities\Inventory());
        foreach($data as $k => $v) {
            $method = 'set'.ucfirst($k);
            if(method_exists($this->getInventory(), $method)) {
                $im = new \Mappers\ItemMapper($v);
                $this->getInventory()->$method($im->getItem());
            }
        }
        
    }

    
    public function getInventory() {
        return $this->inventory;
    }

    public function setInventory($inventory) {
        $this->inventory = $inventory;
        return $this;
    }


    
}
