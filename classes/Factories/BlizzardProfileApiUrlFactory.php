<?php

namespace Factories;

class BlizzardProfileApiUrlFactory {

    private $realm; //eu,us,kr
    private $bTag;
    private $settings; //obj


    public function __construct($settings) {
        $this->settings = $settings;
    }

    public function setParams($realm, $bTag) {
        $this->realm = $realm;
        $this->bTag = $bTag;
    }

    public function getProfileApiUrl() {
        $baseStr = 'https://%s.api.battle.net/d3/profile/%s/?locale=en_GB';
        return sprintf($baseStr, $this->getRealm(), str_replace('#', '-', $this->getBTag()));
    }
    

    
    
    
    
    
    public function getRealm() {
        return $this->realm;
    }

    public function setRealm($realm) {
        $this->realm = $realm;
        return $this;
    }
    
    public function getBTag() {
        return $this->bTag;
    }

    public function setBTag($bTag) {
        $this->bTag = $bTag;
        return $this;
    }




}
