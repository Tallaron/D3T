<?php

namespace Entities;

class Ladder {

    private $realm;
    private $season = 0;
    private $hardcore = 0;
    private $index;
    private $class = false;
    private $min;
    private $max;
    private $ranks = [];
    private $avgLevel;
    private $patterns = [];
    private $results = [];


    public function addSearchResult($player) {
        $this->results[] = $player;
    }

    public function addRank($rank) {
        $this->ranks[] = $rank;
    }
    
    public function getStartIndex() {
        return $this->getMin()-1;
    }
    
    public function getLength() {
        return min(1000, $this->getMax() - $this->getMin() + 1);
    }

    public function addPattern($pattern) {
        $this->patterns[] = $pattern;
    }

    public function getSearchString() {
        return implode('; ', $this->getPatterns());
    }
    
    public function hasSearch() {
        return count($this->getPatterns()) > 0 ? true : false;
    }

    public function getRealm() {
        return $this->realm;
    }

    public function getSeason() {
        return $this->season;
    }

    public function getHardcore() {
        return $this->hardcore;
    }

    public function getIndex() {
        return $this->index;
    }

    public function getClass() {
        return $this->class;
    }

    public function getMin() {
        return $this->min;
    }

    public function getMax() {
        return $this->max;
    }

    public function getRanks() {
        return $this->ranks;
    }

    public function getPatterns() {
        return $this->patterns;
    }

    public function setRealm($realm) {
        $this->realm = $realm;
        return $this;
    }

    public function setSeason($season) {
        $this->season = $season;
        return $this;
    }

    public function setHardcore($hardcore) {
        $this->hardcore = $hardcore;
        return $this;
    }

    public function setIndex($index) {
        $this->index = $index;
        return $this;
    }

    public function setClass($class) {
        $this->class = $class;
        return $this;
    }

    public function setMin($min) {
        $this->min = min(1000, max(1, $min));
        return $this;
    }

    public function setMax($max) {
        $this->max = min(1000, max(1, $max));
        return $this;
    }

    public function setRanks($ranks) {
        $this->ranks = $ranks;
        return $this;
    }

    public function setPatterns($patterns) {
        $filtered = trim(str_replace(' ', '', $patterns), ';');
        if(strlen($filtered) > 0) {
            $this->patterns = explode(';', $filtered);
        }
        return $this;
    }

    public function getAvgLevel() {
        return $this->avgLevel;
    }

    public function setAvgLevel($avgLevel) {
        $this->avgLevel = $avgLevel;
        return $this;
    }

    public function getResults() {
        return $this->results;
    }

    public function setResults($results) {
        $this->results = $results;
        return $this;
    }


    
    
}
