<?php

namespace Mappers;

/**
 * Mapper for \Entities\Hero
 */
abstract class HeroStatsMapper {

    /**
     * 
     * @param StdObject $heroStats From json_decode
     * @return \Entities\HeroStats
     */
    public static function createObj($heroStats) {
        $hs = new \Entities\HeroStats();
        foreach($heroStats as $key => $val) {
            $method = 'set'.ucfirst($key);
            if(method_exists($hs, $method)) {
                $hs->$method($val);
            }
        }
        return $hs;
    }

}
