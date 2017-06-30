<?php

namespace Mappers;

class GemMapper {

    private $gem;
    
    public function __construct($data) {
        $this->setGem(new \Entities\Gem());
        
        foreach($data as $k => $v) {
            $method = 'set'.ucfirst($k);
            if(method_exists($this->getGem(), $method)) {
                $this->getGem()->$method($v);
            }
        }
    }

    
    
    public function getGem() {
        return $this->gem;
    }

    public function setGem($gem) {
        $this->gem = $gem;
        return $this;
    }


    
}
