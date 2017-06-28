<?php

namespace Mappers;

class ProfileMapper extends AbstractMapper {

    private $data;
    private $profile;
    private $content;
    private $contentId;

    public function __construct() {
        $this->setProfile(new \Entities\Profile());
    }

    public function loadProfileData($settings) {
        $bf = new \Factories\BlizzardProfileApiUrlFactory($settings);
        $bf->setParams(
                $this->getProfile()->getRealm(),
                $this->getProfile()->getBTag());
        $this->data = self::getApiArrayWithKey($bf->getProfileApiUrl());
        $this->loadProfileInformation();
        $this->loadHeroes();
        $this->loadSeasons();
    }

    public function initProfile($realm, $bTag, $content, $contentId) {
        $this->getProfile()->setRealm($realm);
        $this->getProfile()->setBTag($bTag);
        $this->setContent($content);
        $this->setContentId($contentId);
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
        $bf = new \Factories\BlizzardHeroApiUrlFactory(null);
        
        foreach($this->getData()['heroes'] as $heroData) {
            $hm = new \Mappers\HeroMapper($heroData);
            $this->getProfile()->addHero($hm->getHero());
            
            if($this->getContent() == 'hero' && $hm->getHero()->getId() == $this->getContentId()) {
                $bf->setParams(
                        $this->getProfile()->getRealm(),
                        $this->getProfile()->getBTag(),
                        $hm->getHero()->getId());

                $heroData = self::getApiObjWithKey($bf->getHeroApiUrl());

                $hm->loadHeroActiveSkills($heroData->skills->active);
                $hm->loadHeroPassiveSkills($heroData->skills->passive);
                $hm->loadHeroItems($heroData->items);
                $hm->loadHeroCube($heroData->legendaryPowers);
                $this->getProfile()->setHero($hm->getHero());
            }
            
            
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

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function getContentId() {
        return $this->contentId;
    }

    public function setContentId($contentId) {
        $this->contentId = $contentId;
        return $this;
    }


    
    
}
