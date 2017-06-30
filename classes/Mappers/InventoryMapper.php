<?php

namespace Mappers;

class InventoryMapper extends AbstractMapper {

    private $inventory;
    
    public function __construct($data) {
        $this->setInventory(new \Entities\Inventory());
        foreach($data as $k => $v) {
            $method = 'set'.ucfirst($k);
            if(method_exists($this->getInventory(), $method)) {
                $mayHaveSockets = in_array($k, self::getSettings()->get('SOCKETED_ITEMS'));
                $im = new \Mappers\ItemMapper($v, $mayHaveSockets);
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
