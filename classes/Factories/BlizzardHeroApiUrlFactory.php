<?php

namespace Factories;

class BlizzardHeroApiUrlFactory {

    private $realm; //eu,us,kr
    private $bTag;
    private $heroId;
    private $settings; //obj


    public function __construct($settings) {
        $this->settings = $settings;
    }

    public function setParams($realm, $bTag, $heroId) {
        $this->setRealm($realm);
        $this->setBTag($bTag);
        $this->setHeroId($heroId);
    }

    public function getHeroApiUrl() {
        $baseStr = 'https://%s.api.battle.net/d3/profile/%s/hero/%d?locale=en_GB';
        return sprintf($baseStr, $this->getRealm(), str_replace('#', '-', $this->getBTag()), $this->getHeroId());
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

    public function getHeroId() {
        return $this->heroId;
    }

    public function setHeroId($heroId) {
        $this->heroId = $heroId;
        return $this;
    }




}
