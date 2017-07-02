<?php

namespace Mappers;

/**
 * Mapper for \Entities\Rank
 */
abstract class RankMapper {

    /**
     * 
     * @param StdObject $rankData From json_decode
     * @return \Entities\Rank
     */
    public static function createObj($rankData) {
        $rank = new \Entities\Rank();
        foreach($rankData->data as $data) {
            switch($data->id) {
                case 'Rank':
                    $rank->setPos($data->number);
                    break;
                case 'RiftLevel':
                    $rank->setLevel($data->number);
                    break;
                case 'RiftTime':
                    $rank->setTime($data->timestamp);
                    break;
                case 'CompletedTime':
                    $rank->setCompletionTime($data->timestamp);
                    break;
                default:
                    break;
            }
        }
        return $rank->setPlayer( \Mappers\PlayerMapper::createobj( $rankData->player[0]) );
    }
    
}
