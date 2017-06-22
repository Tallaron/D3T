<?php

namespace Mappers;

class RankMapper {

    private $rank;


    public function __construct($rankData) {
        $this->rank = new \Entities\Rank();
        foreach($rankData['data'] as $data) {
            switch($data['id']) {
                case 'Rank':
                    $this->rank->setPos($data['number']);
                    break;
                case 'RiftLevel':
                    $this->rank->setLevel($data['number']);
                    break;
                case 'RiftTime':
                    $this->rank->setTime($data['timestamp']);
                    break;
                case 'CompletedTime':
                    $this->rank->setCompletionTime($data['timestamp']);
                    break;
                default:
                    break;
            }
        }
        $pm = new \Mappers\PlayerMapper($rankData['player'][0]);
        $this->rank->setPlayer($pm->getPlayer());
    }
    
    
    
    
    
    
    
    
    
    
    
    public function getRank() {
        return $this->rank;
    }

    public function setRank($rank) {
        $this->rank = $rank;
        return $this;
    }


    
}
