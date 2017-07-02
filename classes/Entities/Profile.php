<?php

namespace Entities;

/**
 * Data class for a players profile including further information like heroes and seasons.
 */
class Profile {

    private $realm;
    private $bTag;
    private $content;
    private $contentId;
    private $lastUpdate;
    private $heroes = [];
    private $hero;
    private $clan;
    private $paragon;
    private $paragonHardcore;
    private $paragonSeasonal;
    private $paragonSeasonalHardcore;
    private $seasons = [];


    /**
     * Creates an array key regarding to the season id by calling $season->getId(). If the array key allready exists its value will be overridden.
     * @param \Entities\Season $season
     */
    public function addSeason(\Entities\Season $season) {
        $this->seasons[$season->getId()] = $season;
    }

    /**
     * 
     * @param \Entities\Hero $hero
     */
    public function addHero(\Entities\Hero $hero) {
        $this->heroes[] = $hero;
    }

    /**
     * 
     * @param String $format Default: 'd.m.Y H:i:s'
     * @return \DateTime
     */
    public function getLastUpdateFormatted($format = 'd.m.Y H:i:s') {
        $date = new \DateTime();
        $date->setTimestamp($this->getLastUpdate());
        return $date->format($format);
    }

    /**
     * Returns the number of heroes allocated in this profile.
     * @return int
     */
    public function getNumHeroes() {
        return count($this->getHeroes());
    }

    /**
     * Returns the short tag for the realm, like 'eu' or 'us'
     * @return String
     */
    public function getRealm() {
        return $this->realm;
    }

    /**
     * Returns the Battle#Tag of the profile
     * @return String
     */
    public function getBTag() {
        return $this->bTag;
    }
    
    /**
     * Returns the URL compatible Battle-Tag
     * @return String
     */
    public function getBTagMinus() {
        return str_replace('#', '-', $this->getBTag());
    }

    /**
     * 
     * @param String $realm
     * @return \Entities\Profile
     */
    public function setRealm($realm) {
        $this->realm = $realm;
        return $this;
    }

    /**
     * 
     * @param String $bTag
     * @return \Entities\Profile
     */
    public function setBTag($bTag) {
        $this->bTag = $bTag;
        return $this;
    }

    /**
     * 
     * @return String
     */
    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    /**
     * 
     * @param String $lastUpdate
     * @return \Entities\Profile
     */
    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }
    
    /**
     * 
     * @return array Returns an array of \Entities\Hero objects
     */
    public function getHeroes() {
        return $this->heroes;
    }

    /**
     * Awaits an array of \Entities\Hero objects.
     * @param array $heroes
     * @return \Entities\Profile
     */
    public function setHeroes($heroes) {
        $this->heroes = $heroes;
        return $this;
    }

    /**
     * 
     * @return String
     */
    public function getClan() {
        return $this->clan;
    }

    /**
     * Gets the non seasonal paragon level
     * @return int
     */
    public function getParagon() {
        return $this->paragon;
    }

    /**
     * Gets the hardcore paragon level
     * @return int
     */
    public function getParagonHardcore() {
        return $this->paragonHardcore;
    }

    /**
     * Gets the seasonal paragon level
     * @return int
     */
    public function getParagonSeasonal() {
        return $this->paragonSeasonal;
    }

    /**
     * Gets the seasonal hardcore paragon level
     * @return int
     */
    public function getParagonSeasonalHardcore() {
        return $this->paragonSeasonalHardcore;
    }

    /**
     * 
     * @param String $clan
     * @return \Entities\Profile
     */
    public function setClan($clan) {
        $this->clan = $clan;
        return $this;
    }

    /**
     * Sets the non seasonal paragon level
     * @param int $paragon
     * @return \Entities\Profile
     */
    public function setParagon($paragon) {
        $this->paragon = $paragon;
        return $this;
    }

    /**
     * Sets the hardcore paragon level
     * @param int $paragon
     * @return \Entities\Profile
     */
    public function setParagonHardcore($paragonHardcore) {
        $this->paragonHardcore = $paragonHardcore;
        return $this;
    }

    /**
     * Sets the seasonal paragon level
     * @param int $paragon
     * @return \Entities\Profile
     */
    public function setParagonSeasonal($paragonSeasonal) {
        $this->paragonSeasonal = $paragonSeasonal;
        return $this;
    }

    /**
     * Sets the seasonal hardcore paragon level
     * @param int $paragon
     * @return \Entities\Profile
     */
    public function setParagonSeasonalHardcore($paragonSeasonalHardcore) {
        $this->paragonSeasonalHardcore = $paragonSeasonalHardcore;
        return $this;
    }

    /**
     * If sort is true, the method returns the season array recursive sorted. If it is false, the array won't be sorted.
     * @param boolean $sort
     * @return array An array of \Entities\Season objects
     */
    public function getSeasons($sort = true) {
        if($sort) { krsort($this->seasons); }
        return $this->seasons;
    }

    /**
     * Awaits an array of \Entities\Season objects
     * @param array $seasons
     * @return \Entities\Profile
     */
    public function setSeasons($seasons) {
        $this->seasons = $seasons;
        return $this;
    }

    /**
     * Returns the URL requested hero object
     * @return \Entities\Hero
     */
    public function getHero() {
        return $this->hero;
    }

    /**
     * 
     * @param \Entities\Hero $hero
     * @return \Entities\Profile
     */
    public function setHero(\Entities\Hero $hero) {
        $this->hero = $hero;
        return $this;
    }

    /**
     * 
     * @return String
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Returns contentId for more details, e.g. int heroId
     * @return mixed
     */
    public function getContentId() {
        return $this->contentId;
    }

    /**
     * 
     * @param String $content The contents key
     * @return \Entities\Profile
     */
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    /**
     * 
     * @param mixed $contentId E.g. int $heroId
     * @return \Entities\Profile
     */
    public function setContentId($contentId) {
        $this->contentId = $contentId;
        return $this;
    }


}
