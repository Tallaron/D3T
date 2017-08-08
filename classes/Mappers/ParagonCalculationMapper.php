<?php

namespace Mappers;

class ParagonCalculationMapper {

    public static function createObject($ns = 0, $s = 0) {
        return (new \Helper\ParagonCalculator())
            ->setData( self::loadData() )
            ->setNonSeason( $ns )
            ->setSeason( $s )
            ->calculate();
    }
    
    
    
    
    private static function loadData() {
        return unserialize(file_get_contents('data/paragon.dat'));
    }




    
    
    
    
    
    
}
