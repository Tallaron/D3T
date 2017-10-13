<?php

namespace Mappers;

/**
 * Mapper for \Entities\Item
 */
abstract class ItemMapper extends AbstractMapper {

    /**
     * 
     * @param StdObject $data From json_decode
     * @param boolean $mayHaveSockets
     * @return \Entities\Item
     */
    public static function createObj($data, $mayHaveSockets = false) {
        $item = new \Entities\Item();
        if($data != null) {
            $itemData = self::getApiDataWithKey(
                    \Factories\BlizzardItemApiUrlFactory::getUrl(
                            ITEM_API_DEFAULT_REALM,
                            $data->tooltipParams),
                    true,
                    SYS_ITEM_CACHE_LIFETIME);
            $item->setTooltipData($itemData);
            if($mayHaveSockets) {
                self::addSockets($item, $itemData);
            }

            if(property_exists($itemData->attributesRaw, 'Ancient_Rank')) {
                $item->setAncientRank((int)$itemData->attributesRaw->Ancient_Rank->min);
            }
            if(property_exists($itemData->attributesRaw, 'CubeEnchantedGemRank')) {
                $item->setCaldesan((int)$itemData->attributesRaw->CubeEnchantedGemRank->min);
            }
        
            foreach($data as $k => $v) {
                $method = 'set'.ucfirst($k);
                if(method_exists($item, $method)) {
                    $item->$method($v);
                }
            }
        }
        return $item;
    }

    /**
     * Creates \Entities\Gem objects and puts them into the \Entities\Item object
     * @param \Entities\Item $item
     * @param StdObject $itemData
     */
    private static function addSockets(\Entities\Item $item, $itemData) {
        $socketsRaw = max(
                (property_exists($itemData->attributesRaw, 'Sockets') ? $itemData->attributesRaw->Sockets->min : 0),
                count($itemData->gems));
        $item->setSockets($socketsRaw);
        if($socketsRaw) {
            foreach($itemData->gems as $gemData) {
                $item->addGem( \Mappers\GemMapper::createObj($gemData->item) );
            }
        }
    }
    
    /**
     * Creates a placeholder shadowed item for displaying in the inventory, e.g.
     * unused offhand slot if wielding a two-handed weapon
     * @param \Entities\Item $item
     * @return \Entities\Item
     */
    public static function createShadowItem(\Entities\Item $item) {
        return (new \Entities\Item())
            ->setId( $item->getId() )
            ->setName( $item->getName() )
            ->setIcon( $item->getIcon() )
            ->setDisplayColor( 'disabled-2h' )
            ->setTooltipParams( $item->getTooltipParams() );
    }
    
}
