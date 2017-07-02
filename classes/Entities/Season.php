<?php

namespace Entities;

/**
 * Data class for a Diablo 3 season.
 */
class Season {

    private $id;
    private $paragon;
    private $paragonHardcore;
    private $killedMonsters;
    private $killedElites;
    private $timeBarb;
    private $timeCrus;
    private $timeDh;
    private $timeMonk;
    private $timeWd;
    private $timeWiz;
    private $timeNecro;
    
    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Returns the seasonal softcore paragon level.
     * @return int
     */
    public function getParagon() {
        return $this->paragon;
    }

    /**
     * Returns the seasonal hardcore paragon level
     * @return int
     */
    public function getParagonHardcore() {
        return $this->paragonHardcore;
    }

    /**
     * 
     * @return int
     */
    public function getKilledMonsters() {
        return $this->killedMonsters;
    }

    /**
     * 
     * @return int
     */
    public function getKilledElites() {
        return $this->killedElites;
    }

    /**
     * Returns the amount of played of the barbarian class.
     * @return double
     */
    public function getTimeBarb() {
        return $this->timeBarb;
    }

    /**
     * Returns the amount of played of the crusader class.
     * @return double
     */
    public function getTimeCrus() {
        return $this->timeCrus;
    }

    /**
     * Returns the amount of played of the demon hunter class.
     * @return double
     */
    public function getTimeDh() {
        return $this->timeDh;
    }

    /**
     * Returns the amount of played of the monk class.
     * @return double
     */
    public function getTimeMonk() {
        return $this->timeMonk;
    }

    /**
     * Returns the amount of played of the witch doctor class.
     * @return double
     */
    public function getTimeWd() {
        return $this->timeWd;
    }

    /**
     * Returns the amount of played of the wizard class.
     * @return double
     */
    public function getTimeWiz() {
        return $this->timeWiz;
    }

    /**
     * Returns the amount of played of the necromancer class.
     * @return double
     */
    public function getTimeNecro() {
        return $this->timeNecro;
    }

    /**
     * 
     * @param int $id
     * @return \Entities\Season
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param int $paragon
     * @return \Entities\Season
     */
    public function setParagon($paragon) {
        $this->paragon = $paragon;
        return $this;
    }

    /**
     * 
     * @param int $paragonHardcore
     * @return \Entities\Season
     */
    public function setParagonHardcore($paragonHardcore) {
        $this->paragonHardcore = $paragonHardcore;
        return $this;
    }
    
    /**
     * 
     * @param int $killedMonsters
     * @return \Entities\Season
     */
    public function setKilledMonsters($killedMonsters) {
        $this->killedMonsters = $killedMonsters;
        return $this;
    }

    /**
     * 
     * @param int $killedElites
     * @return \Entities\Season
     */
    public function setKilledElites($killedElites) {
        $this->killedElites = $killedElites;
        return $this;
    }

    /**
     * 
     * @param double $timeBarb 0..1
     * @return \Entities\Season
     */
    public function setTimeBarb($timeBarb) {
        $this->timeBarb = $timeBarb;
        return $this;
    }

    /**
     * 
     * @param double $timeCrus 0..1
     * @return \Entities\Season
     */
    public function setTimeCrus($timeCrus) {
        $this->timeCrus = $timeCrus;
        return $this;
    }

    /**
     * 
     * @param double $timeDh 0..1
     * @return \Entities\Season
     */
    public function setTimeDh($timeDh) {
        $this->timeDh = $timeDh;
        return $this;
    }

    /**
     * 
     * @param double $timeMonk 0..1
     * @return \Entities\Season
     */
    public function setTimeMonk($timeMonk) {
        $this->timeMonk = $timeMonk;
        return $this;
    }

    /**
     * 
     * @param double $timeWd 0..1
     * @return \Entities\Season
     */
    public function setTimeWd($timeWd) {
        $this->timeWd = $timeWd;
        return $this;
    }

    /**
     * 
     * @param double $timeWiz 0..1
     * @return \Entities\Season
     */
    public function setTimeWiz($timeWiz) {
        $this->timeWiz = $timeWiz;
        return $this;
    }

    /**
     * 
     * @param double $timeNecro 0..1
     * @return \Entities\Season
     */
    public function setTimeNecro($timeNecro) {
        $this->timeNecro = $timeNecro;
        return $this;
    }

}
