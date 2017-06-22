<?php

namespace Entities;

class Rank {

    private $pos;
    private $level;
    private $time;
    private $completionTime;
    private $player;

    private $isMatch = false;

    public function isMatch() {
        return $this->isMatch;
    }
    
    public function setMatch($val) {
        $this->isMatch = $val;
    }

    public function getTimeFormatted() {
        return sprintf(
                '%02d:%02d.%03d',
                ($this->getTime()/1000/60)%60,
                ($this->getTime()/1000)%60,
                $this->getTime()%1000);
    }

    public function getCompletionDate($format = 'd.m.Y H:i:s') {
        $date = new \DateTime();
        return $date->setTimestamp(floor($this->getCompletionTime()/1000))->format($format);
    }

    public function getPos() {
        return $this->pos;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getTime() {
        return $this->time;
    }

    public function getCompletionTime() {
        return $this->completionTime;
    }

    public function getPlayer() {
        return $this->player;
    }

    public function getIsMatch() {
        return $this->isMatch;
    }

    public function setPos($pos) {
        $this->pos = $pos;
        return $this;
    }

    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    public function setTime($time) {
        $this->time = $time;
        return $this;
    }

    public function setCompletionTime($completionTime) {
        $this->completionTime = $completionTime;
        return $this;
    }

    public function setPlayer($player) {
        $this->player = $player;
        return $this;
    }

    public function setIsMatch($isMatch) {
        $this->isMatch = $isMatch;
        return $this;
    }


    
}
