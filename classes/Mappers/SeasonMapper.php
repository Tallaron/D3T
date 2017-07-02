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
        return (new \Entities\Season())
            ->setId( $rawData->seasonId )
            ->setParagon( $rawData->paragonLevel )
            ->setParagonHardcore( $rawData->paragonLevelHardcore )
            ->setKilledMonsters( $rawData->kills->monsters )
            ->setKilledElites( $rawData->kills->elites )
            ->setTimeBarb( $rawData->timePlayed->barbarian )
            ->setTimeCrus( $rawData->timePlayed->crusader )
            ->setTimeDh( $rawData->timePlayed->{'demon-hunter'} )
            ->setTimeMonk( $rawData->timePlayed->monk )
            ->setTimeNecro( $rawData->timePlayed->necromancer )
            ->setTimeWd( $rawData->timePlayed->{'witch-doctor'} )
            ->setTimeWiz( $rawData->timePlayed->wizard );
    }

}
