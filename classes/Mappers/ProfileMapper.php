<?php

namespace Mappers;

class ProfileMapper extends AbstractMapper {

    private $data;
    private $profile;

    public function __construct() {
        $this->setProfile(new \Entities\Profile());
    }

    public function loadProfileData($settings) {
        $bf = new \Factories\BlizzardProfileApiUrlFactory($settings);
        $bf->setParams(
                $this->getProfile()->getRealm(),
                $this->getProfile()->getBTag());
        $this->data = self::getApiJsonWithKey($bf->getProfileApiUrl());
        $this->loadProfileInformation();
        $this->loadHeroes();
        $this->loadSeasons();
    }

    public function initProfile($realm, $bTag) {
        $this->getProfile()->setRealm($realm);
        $this->getProfile()->setBTag($bTag);
    }
    
    
    private function loadProfileInformation() {
        $this->getProfile()->setLastUpdate($this->getData()['lastUpdated']);
        $this->getProfile()->setClan($this->getData()['guildName']);
        $this->getProfile()->setParagon($this->getData()['paragonLevel']);
        $this->getProfile()->setParagonHardcore($this->getData()['paragonLevelHardcore']);
        $this->getProfile()->setParagonSeasonal($this->getData()['paragonLevelSeason']);
        $this->getProfile()->setParagonSeasonalHardcore($this->getData()['paragonLevelSeasonHardcore']);
    }

    

    private function loadHeroes() {
        foreach($this->getData()['heroes'] as $heroData) {
            $hm = new \Mappers\HeroMapper($heroData);
            $this->getProfile()->addHero($hm->getHero());
        }
    }

    
    
    private function loadSeasons() {
        foreach($this->getData()['seasonalProfiles'] as $season) {
            $sm = new \Mappers\SeasonMapper();
            $sm->loadData($season);
            if($sm->getSeason()->getId() > 0) {
                $this->getProfile()->addSeason($sm->getSeason());
            }
        }
    }

    

    public function getData() {
        return $this->data;
    }

    public function getProfile() {
        return $this->profile;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function setProfile($profile) {
        $this->profile = $profile;
        return $this;
    }

    
    
    
}
