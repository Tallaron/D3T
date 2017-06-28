<?php

namespace Mappers;

class ItemMapper {

    private $item;
    
    public function __construct($data) {
        $this->setItem(new \Entities\Item());
        foreach($data as $k => $v) {
            $method = 'set'.ucfirst($k);
            if(method_exists($this->getItem(), $method)) {
                $this->getItem()->$method($v);
            }
        }
    }

    
    
    public function getItem() {
        return $this->item;
    }

    public function setItem($item) {
        $this->item = $item;
        return $this;
    }


    
}
