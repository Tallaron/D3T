<?php

namespace Factories;

class BlizzardItemApiUrlFactory {

    private $realm; //eu,us,kr
    private $item;


    public function setParams($realm, $item) {
        $this->setRealm($realm);
        $this->setItem($item);
    }

    public function getItemApiUrl() {
        $baseStr = 'https://%s.api.battle.net/d3/data/item/%s?locale=en_GB';
        return sprintf($baseStr, $this->getRealm(), $this->getItem());
    }
    

    
    
    
    
    
    public function getRealm() {
        return $this->realm;
    }

    public function getItem() {
        return $this->item;
    }

    public function setRealm($realm) {
        $this->realm = $realm;
        return $this;
    }

    public function setItem($item) {
        $this->item = $item;
        return $this;
    }




}
