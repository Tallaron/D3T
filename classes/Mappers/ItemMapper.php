<?php

namespace Mappers;

class ItemMapper extends AbstractMapper {

    private $item;
    
    public function __construct($data, $mayHaveSockets = false) {
        $this->setItem(new \Entities\Item());

        if($mayHaveSockets) {
            $bf = new \Factories\BlizzardItemApiUrlFactory();
            $bf->setParams('eu', str_replace('item/', '', $data->tooltipParams));

            $itemData = self::getApiObjWithKey($bf->getItemApiUrl());
            if(property_exists($itemData->attributesRaw, 'Sockets')) {
                $this->getItem()->setSockets((int)$itemData->attributesRaw->Sockets->min);
            
                foreach($itemData->gems as $gemData) {
                    $gm = new \Mappers\GemMapper($gemData->item);
                    $this->getItem()->addGem($gm->getGem());
                }
            }
        }
        
        
        
        foreach($data as $k => $v) {
            $method = 'set'.ucfirst($k);
            if(method_exists($this->getItem(), $method)) {
                $this->getItem()->$method($v);
            }
        }
    }

    
    
    public function getItem() {
        return $this->item;
    }

    public function setItem($item) {
        $this->item = $item;
        return $this;
    }


    
}
