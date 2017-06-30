<?php

namespace Mappers;

class CubeMapper {

    private $cube;
    
    public function __construct($data) {
        $this->setCube(new \Entities\Cube());
        foreach($data as $itemData) {
            $im = new \Mappers\ItemMapper($itemData);
            $this->getCube()->addItem($im->getItem());
        }
        
    }

    

    
    
    public function getCube() {
        return $this->cube;
    }

    public function setCube($cube) {
        $this->cube = $cube;
        return $this;
    }

    

    
}
