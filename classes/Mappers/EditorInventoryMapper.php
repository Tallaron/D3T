<?php

namespace Mappers;

class EditorInventoryMapper {

    public static function createObject($data) {
        $obj = new \Entities\EditorInventory();
        foreach($data as $item) {
            $editorItem = new \Entities\EditorItem( $item->getId() );
            $gems = \Mappers\BuildDBMapper::findGemsByItemId( $item->getId() );
            
            foreach($gems as $gem) {
                $editorItem->addGem($gem, $gem->getSlotIndex());
            }

            $method = 'set'.ucfirst($item->slotKey);
            if(method_exists($obj, $method)) {
                $obj->$method($editorItem);
            }
        }
        return $obj;
    }
    
}
