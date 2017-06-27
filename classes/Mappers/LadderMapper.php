<?php

namespace Mappers;

class LadderMapper extends AbstractMapper {

    private $data;
    private $ladder;

    public function __construct() {
        $this->setLadder(new \Entities\Ladder());
    }

    public function loadLadderData($settings) {
        $bf = new \Factories\BlizzardLadderApiUrlFactory($settings);
        $bf->setParams(
                $this->getLadder()->getRealm(),
                $this->getLadder()->getSeason(),
                $this->getLadder()->getHardcore(),
                $this->getLadder()->getIndex(),
                $this->getLadder()->getClass());
        $this->data = self::getApiJson($bf->getLeaderboardApiUrl());
        $this->getLadder()->setLastUpdate($this->getData()['last_update_time']);
        $this->addRanks();
    }

    public function initLadder($realm, $season, $hardcore, $index, $class, $min, $max) {
        $this->getLadder()->setRealm($realm);
        $this->getLadder()->setSeason($season);
        $this->getLadder()->setHardcore($hardcore);
        $this->getLadder()->setIndex($index);
        $this->getLadder()->setClass($class);
        $this->getLadder()->setMin($min);
        $this->getLadder()->setMax($max);
    }
    
    
    public function initSearch($patterns) {
        $this->getLadder()->setPatterns($patterns);
    }

    
    private function addRanks() {
        $levelSum = 0;
        $data = array_slice($this->data['row'], $this->getLadder()->getStartIndex(), $this->getLadder()->getLength());
        foreach($data as $row) {
            $rm = new \Mappers\RankMapper($row);
            $this->getLadder()->addRank($rm->getRank());
            $levelSum += $rm->getRank()->getLevel();
            $this->search($rm->getRank());
        }
        $this->getLadder()->setAvgLevel(number_format($levelSum / $this->getLadder()->getLength(), 2));
    }
    
    
    
    private function search($rank) {
        if($this->getLadder()->hasSearch()) {
            foreach($this->getLadder()->getPatterns() as $pattern) {
                if(strpos(strtolower($rank->getPlayer()->getName()), strtolower($pattern)) !== false) {
                    $rank->setMatch(true);
                    $this->getLadder()->addSearchResult($rank->getPlayer());
                }
            }
        }
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

    public function getMin() {
        return $this->min;
    }

    public function getMax() {
        return $this->max;
    }

    public function setMin($min) {
        $this->min = $min;
        return $this;
    }

    public function setMax($max) {
        $this->max = $max;
        return $this;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function getLadder() {
        return $this->ladder;
    }

    public function setLadder($ladder) {
        $this->ladder = $ladder;
        return $this;
    }


    
    
    
}
