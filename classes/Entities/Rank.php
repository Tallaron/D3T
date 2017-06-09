<?php

namespace Entities;

class Rank {

    private $name;
    private $level;
    private $time;
    private $date;
    private $profile;










    public function getProfile() {
        return $this->profile;
    }

    public function setProfile($profile) {
        $this->profile = $profile;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getTime() {
        return $this->time;
    }

    public function setName($name) {
        $this->name = $name;
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

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }


    
    
}
