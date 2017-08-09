<?php

namespace Mappers;

/**
 * Mapper for \Entities\Season
 */
abstract class SeasonMapper {

    /**
     * 
     * @param StdObject $rawData From json_decode
     * @return \Entities\Season
     */
    public static function createObj($rawData) {
        $season = (new \Entities\Season())
            ->setId( $rawData->seasonId )
            ->setParagon( $rawData->paragonLevel )
            ->setParagonHardcore( $rawData->paragonLevelHardcore )
            ->setKilledMonsters( $rawData->kills->monsters )
            ->setKilledElites( $rawData->kills->elites );
        foreach($rawData->timePlayed as $key => $playedValue) {
            $season->setPlayed($key, $playedValue);
            $season->addPlayed($playedValue);
         }
         return $season;
    }

}
