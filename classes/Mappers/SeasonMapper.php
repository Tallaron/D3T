<?php

namespace Mappers;

class SeasonMapper {

    private $season;
    
    
    public function __construct() {
        $this->setSeason(new \Entities\Season());
    }

    
    
    public function loadData($rawData) {
        $this->getSeason()->setId( $rawData['seasonId'] );
        $this->getSeason()->setParagon( $rawData['paragonLevel'] );
        $this->getSeason()->setParagonHardcore( $rawData['paragonLevelHardcore'] );
        $this->getSeason()->setKilledMonsters( $rawData['kills']['monsters'] );
        $this->getSeason()->setKilledElites( $rawData['kills']['elites'] );
        $this->getSeason()->setTimeBarb( $rawData['timePlayed']['barbarian'] );
        $this->getSeason()->setTimeCrus( $rawData['timePlayed']['crusader'] );
        $this->getSeason()->setTimeDh( $rawData['timePlayed']['demon-hunter'] );
        $this->getSeason()->setTimeMonk( $rawData['timePlayed']['monk'] );
        $this->getSeason()->setTimeWd( $rawData['timePlayed']['witch-doctor'] );
        $this->getSeason()->setTimeWiz( $rawData['timePlayed']['wizard'] );
    }

    







    public function getSeason() {
        return $this->season;
    }

    public function setSeason($season) {
        $this->season = $season;
        return $this;
    }


    
    
}
