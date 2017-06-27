<?php

namespace Entities;

class Profile {

    private $realm;
    private $bTag;
    private $lastUpdate;
    private $heroes = [];
    private $clan;
    private $paragon;
    private $paragonHardcore;
    private $paragonSeasonal;
    private $paragonSeasonalHardcore;
    private $seasons = [];



    public function addSeason($season) {
        $this->seasons[] = $season;
    }

    public function addHero($hero) {
        $this->heroes[] = $hero;
    }

    public function getLastUpdateFormatted($format = 'd.m.Y H:i:s') {
        $date = new \DateTime();
        $date->setTimestamp($this->getLastUpdate());
        return $date->format($format);
    }

        public function getNumHeroes() {
        return count($this->getHeroes());
    }

        public function getRealm() {
        return $this->realm;
    }

    public function getBTag() {
        return $this->bTag;
    }

    public function setRealm($realm) {
        $this->realm = $realm;
        return $this;
    }

    public function setBTag($bTag) {
        $this->bTag = $bTag;
        return $this;
    }

    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }
    
    public function getHeroes() {
        return $this->heroes;
    }

    public function setHeroes($heroes) {
        $this->heroes = $heroes;
        return $this;
    }

    public function getClan() {
        return $this->clan;
    }

    public function getParagon() {
        return $this->paragon;
    }

    public function getParagonHardcore() {
        return $this->paragonHardcore;
    }

    public function getParagonSeasonal() {
        return $this->paragonSeasonal;
    }

    public function getParagonSeasonalHardcore() {
        return $this->paragonSeasonalHardcore;
    }

    public function setClan($clan) {
        $this->clan = $clan;
        return $this;
    }

    public function setParagon($paragon) {
        $this->paragon = $paragon;
        return $this;
    }

    public function setParagonHardcore($paragonHardcore) {
        $this->paragonHardcore = $paragonHardcore;
        return $this;
    }

    public function setParagonSeasonal($paragonSeasonal) {
        $this->paragonSeasonal = $paragonSeasonal;
        return $this;
    }

    public function setParagonSeasonalHardcore($paragonSeasonalHardcore) {
        $this->paragonSeasonalHardcore = $paragonSeasonalHardcore;
        return $this;
    }

    public function getSeasons() {
        return $this->seasons;
    }

    public function setSeasons($seasons) {
        $this->seasons = $seasons;
        return $this;
    }





}
