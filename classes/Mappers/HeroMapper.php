<?php

namespace Mappers;


class HeroMapper {

    private $hero;
    
    
    
    
    public function __construct($heroData) {
        $this->setHero( new \Entities\Hero() );
        $this->getHero()->setId( $heroData['id'] );
        $this->getHero()->setName( $heroData['name'] );
        $this->getHero()->setClass( $heroData['class'] );
        $this->getHero()->setGender( $heroData['gender'] );
        $this->getHero()->setLevel( $heroData['level'] );
        $this->getHero()->setEliteKills( $heroData['kills']['elites'] );
        $this->getHero()->setSeasonal( isset($heroData['seasonal']) ? $heroData['seasonal'] : false );
        $this->getHero()->setHardcore( isset($heroData['hardcore']) ? $heroData['hardcore'] : false );
    }

    
    
    
    
    
    
    public function getHero() {
        return $this->hero;
    }

    public function setHero($hero) {
        $this->hero = $hero;
        return $this;
    }


}
