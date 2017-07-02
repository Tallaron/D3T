<?php

namespace Mappers;

/**
 * Mapper for \Entities\Inventory
 */
abstract class InventoryMapper extends AbstractMapper {

    /**
     * 
     * @param StdObject $data From json_decode
     * @return \Entities\Inventory
     */
    public static function createObj($data) {
        $inventory = new \Entities\Inventory();
        foreach($data as $k => $v) {
            $method = 'set'.ucfirst($k);
            if(method_exists($inventory, $method)) {
                $mayHaveSockets = in_array($k, self::getSettings()->get('SOCKETED_ITEMS'));
                $inventory->$method( \Mappers\ItemMapper::createObj($v, $mayHaveSockets) );
            }
        }
        return $inventory;
    }
    
}
