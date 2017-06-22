<?php

namespace Factories;

class BlizzardApiUrlFactory {

    private $realm; //eu,us,kr
    private $season; //season, era
    private $hardcore; //hardcore, ''
    private $index; //1..10 / 1..7
    private $class; //...
    private $settings; //obj


    public function __construct($settings) {
        $this->settings = $settings;
    }

    public function setParams($realm, $season, $hardcore, $index, $class) {
        $this->realm = $realm;
        $this->season = $season == 1 ? 'season' : 'era';
        $this->hardcore = $hardcore == 1 ? 'hardcore-' : '';
        $this->class = $class;
        if($season == 1) {
            $this->index = max($this->settings->get('RANKING_MIN_SEASON_INDEX'), min($this->settings->get('RANKING_MAX_SEASON_INDEX'), $index));
        } else { //era
            $this->index = max($this->settings->get('RANKING_MIN_ERA_INDEX'), min($this->settings->get('RANKING_MAX_ERA_INDEX'), $index));
        }
    }

    public function getLeaderboardApiUrl() {
        $baseStr = 'https://%s.api.battle.net/data/d3/%s/%d/leaderboard/rift-%s%s';
        return sprintf($baseStr, $this->realm, $this->season, $this->index, $this->hardcore, $this->class);
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
    }

    public function setSeason($season) {
        $this->season = $season;
    }

    public function setHardcore($hardcore) {
        $this->hardcore = $hardcore;
    }

    public function setIndex($index) {
        $this->index = $index;
    }

    public function setClass($class) {
        $this->class = $class;
    }

}
