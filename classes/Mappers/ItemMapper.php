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
            if($mayHaveSockets) {
                $itemData = self::getApiDataWithKey(
                        \Factories\BlizzardItemApiUrlFactory::getUrl(
                                ITEM_API_DEFAULT_REALM,
                                $data->tooltipParams),
                        true);
                if(property_exists($itemData->attributesRaw, 'Sockets')) {
                    $item->setSockets($itemData->attributesRaw->Sockets->min);
                    self::addSockets($item, $itemData->gems);
                }
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
     * @param StdObject $socketData
     */
    private static function addSockets($item, $socketData) {
        foreach($socketData as $gemData) {
            $item->addGem( \Mappers\GemMapper::createObj($gemData->item) );
        }
    }
    
    
    
    public static function createShadowItem(\Entities\Item $item) {
        return (new \Entities\Item())
            ->setId( $item->getId() )
            ->setName( $item->getName() )
            ->setIcon( $item->getIcon() )
            ->setDisplayColor( 'disabled-2h' )
            ->setTooltipParams( $item->getTooltipParams() );
    }
    
}
