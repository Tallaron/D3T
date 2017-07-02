<?php

namespace Mappers;

/**
 * Mapper for \Entities\Hero
 */
abstract class HeroMapper {

    /**
     * 
     * @param StdObject $heroData From json_decode
     * @return \Entities\Hero
     */
    public static function createObj($heroData) {
        $hero = (new \Entities\Hero())
            ->setId( $heroData->id )
            ->setName( $heroData->name )
            ->setClass( $heroData->class )
            ->setGender( $heroData->gender )
            ->setLevel( $heroData->level )
            ->setEliteKills( $heroData->kills->elites )
            ->setSeasonal( isset($heroData->seasonal) ? $heroData->seasonal : false )
            ->setHardcore( isset($heroData->hardcore) ? $heroData->hardcore : false );
        return $hero;
    }
    
    
    public static function addHeroDetails(\Entities\Hero $hero, $heroData) {
        if(property_exists($heroData->skills, 'active')) {
            self::loadHeroActiveSkills($hero, $heroData->skills->active);
        }
        if(property_exists($heroData->skills, 'passive')) {
            self::loadHeroPassiveSkills($hero, $heroData->skills->passive);
        }
        if(property_exists($heroData, 'items')) {
            self::loadHeroItems($hero, $heroData->items);
        }
        if(property_exists($heroData, 'legendaryPowers')) {
            self::loadHeroCube($hero, $heroData->legendaryPowers);
        }
    }

    


    /**
     * 
     * @param \Entities\Hero $hero
     * @param StdObject $activeSkills From json_decode (partial)
     */
    private static function loadHeroActiveSkills(\Entities\Hero $hero, $activeSkills) {
        for($i=0; $i<count($activeSkills); $i++) {
            $hero->addActiveSkill( \Mappers\ActiveSkillMapper::createObj($activeSkills[$i]), $i);
        }
    }

    /**
     * 
     * @param \Entities\Hero $hero
     * @param StdObject $passiveSkills From json_decode (partial)
     */
    private static function loadHeroPassiveSkills(\Entities\Hero $hero, $passiveSkills) {
        for($i=0; $i<count($passiveSkills); $i++) {
            $hero->addPassiveSkill( \Mappers\PassiveSkillMapper::createObj($passiveSkills[$i]), $i);
        }
    }

    /**
     * 
     * @param \Entities\Hero $hero
     * @param StdObject $items From json_decode (partial)
     */
    private static function loadHeroItems(\Entities\Hero $hero, $items) {
          $hero->setInventory( \Mappers\InventoryMapper::createObj($items) );
    }

    /**
     * 
     * @param \Entities\Hero $hero
     * @param StdObject $cubeItems From json_decode (partial)
     */
    private static function loadHeroCube(\Entities\Hero $hero, $cubeItems) {
        $hero->setCube( \Mappers\CubeMapper::createObj($cubeItems) );
    }

}
