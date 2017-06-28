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


    public function loadHeroActiveSkills($activeSkills) {
        foreach($activeSkills as $obj) {
            $asm = new \Mappers\ActiveSkillMapper($obj->skill);
            $rm = new \Mappers\RuneMapper($obj->rune);
            $asm->getSkill()->setRune($rm->getRune());
            $this->getHero()->addActiveSkill($asm->getSkill());
        }
    }
    
    public function loadHeroPassiveSkills($passiveSkills) {
        foreach($passiveSkills as $obj) {
            $psm = new \Mappers\PassiveSkillMapper($obj->skill);
            $this->getHero()->addPassiveSkill($psm->getSkill());
        }
    }

    public function loadHeroItems($items) {
        $invm = new \Mappers\InventoryMapper($items);
        $this->getHero()->setInventory($invm->getInventory());
    }

    public function loadHeroCube($cubeItems) {
        
    }

    
    public function getHero() {
        return $this->hero;
    }

    public function setHero($hero) {
        $this->hero = $hero;
        return $this;
    }


}
