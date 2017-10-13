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
            if($v instanceof \Entities\Item) {
                $method = 'set'.ucfirst($v->getType());
                self::addGems($v);
                $item = $v;
            } else {
                $method = 'set'.ucfirst($k);
                $mayHaveSockets = in_array($k, self::getSettings()->get('SOCKETED_ITEMS'));
                $item = \Mappers\ItemMapper::createObj($v, $mayHaveSockets);
            }
            
            if(method_exists($inventory, $method)) {
                $inventory->$method( $item );
            }
        }
        if($inventory->getMainHand()->isTwohand() && $inventory->getOffHand()->getId() == -1) {
            $inventory->setOffHand(\Mappers\ItemMapper::createShadowItem(
                    $inventory->getMainHand()) );
        }
        return $inventory;
    }
    
    
    private static function addGems(\Entities\Item $item) {
        if($item->getBuildId() != false && $item->getId() != -1) {
            $gems = \Mappers\BuildDBMapper::findGemsByItemId($item->getBuildId(), $item->getId());
            foreach($gems as $gem) {
                $item->addGem($gem, $gem->getIndex());
            }
        }
    }
    
    
}
