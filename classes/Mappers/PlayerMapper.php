<?php

namespace Mappers;

class PlayerMapper {

    private $player;
    
    public function __construct($playerData) {
        $this->player = new \Entities\Player();
        foreach($playerData['data'] as $data) {
            switch($data['id']) {
                case 'HeroBattleTag':
                    $this->player->setBTag($data['string']);
                    break;
                case 'HeroClass':
                    $this->player->setClass($data['string']);
                    break;
                case 'ParagonLevel':
                    $this->player->setParagon($data['number']);
                    break;
                case 'HeroClanTag':
                    $this->player->setClanShort($data['string']);
                    break;
                case 'ClanName':
                    $this->player->setClan($data['string']);
                    break;
                case 'HeroId':
                    $this->player->setId($data['number']);
                    break;
                default:
                    break;
            }
        }
        
    }

    
    
    



    public function getPlayer() {
        return $this->player;
    }

    public function setPlayer($player) {
        $this->player = $player;
        return $this;
    }

    
}
