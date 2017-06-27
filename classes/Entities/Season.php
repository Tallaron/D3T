<?php

namespace Entities;

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
    
    
    
    
    public function getId() {
        return $this->id;
    }

    public function getParagon() {
        return $this->paragon;
    }

    public function getParagonHardcore() {
        return $this->paragonHardcore;
    }

    public function getKilledMonsters() {
        return $this->killedMonsters;
    }

    public function getKilledElites() {
        return $this->killedElites;
    }

    public function getTimeBarb() {
        return $this->timeBarb;
    }

    public function getTimeCrus() {
        return $this->timeCrus;
    }

    public function getTimeDh() {
        return $this->timeDh;
    }

    public function getTimeMonk() {
        return $this->timeMonk;
    }

    public function getTimeWd() {
        return $this->timeWd;
    }

    public function getTimeWiz() {
        return $this->timeWiz;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function setKilledMonsters($killedMonsters) {
        $this->killedMonsters = $killedMonsters;
        return $this;
    }

    public function setKilledElites($killedElites) {
        $this->killedElites = $killedElites;
        return $this;
    }

    public function setTimeBarb($timeBarb) {
        $this->timeBarb = $timeBarb;
        return $this;
    }

    public function setTimeCrus($timeCrus) {
        $this->timeCrus = $timeCrus;
        return $this;
    }

    public function setTimeDh($timeDh) {
        $this->timeDh = $timeDh;
        return $this;
    }

    public function setTimeMonk($timeMonk) {
        $this->timeMonk = $timeMonk;
        return $this;
    }

    public function setTimeWd($timeWd) {
        $this->timeWd = $timeWd;
        return $this;
    }

    public function setTimeWiz($timeWiz) {
        $this->timeWiz = $timeWiz;
        return $this;
    }


    
}
