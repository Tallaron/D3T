<?php

namespace Mappers;

/**
 * Mapper for \Entities\Player
 */
abstract class PlayerMapper {

    /**
     * 
     * @param StdObject $playerData From json_decode
     * @return \Entities\Player
     */
    public static function createobj($playerData) {
        $player = new \Entities\Player();
        foreach($playerData->data as $data) {
            switch($data->id) {
                case 'HeroBattleTag':
                    $player->setBTag($data->string);
                    break;
                case 'HeroClass':
                    $player->setHeroClass($data->string);
                    break;
                case 'ParagonLevel':
                    $player->setParagon($data->number);
                    break;
                case 'HeroClanTag':
                    $player->setClanShort($data->string);
                    break;
                case 'ClanName':
                    $player->setClan($data->string);
                    break;
                case 'HeroId':
                    $player->setId($data->number);
                    break;
                case 'HeroGender':
                    $player->setGender($data->string);
                    break;
                default:
                    break;
            }
        }
        return $player;
    }
    
}
