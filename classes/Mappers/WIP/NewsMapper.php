<?php

namespace Mappers;

/**
 * Mapper class for a Blizzard news taken from their news stream/rss.
 */
abstract class NewsMapper {
    
    /**
     * 
     * @param \DOMNodeList $rawData
     * @return \Entities\News
     */
    public static function createObj(\DOMElement $rawData) {
        return (new \Entities\News())
            ->setTitle( $rawData->getElementsByTagName('title')->item(0)->textContent )
            ->setPublished( $rawData->getElementsByTagName('published')->item(0)->textContent )
            ->setUpdated( $rawData->getElementsByTagName('updated')->item(0)->textContent )
            ->setId( $rawData->getElementsByTagName('id')->item(0)->textContent )
            ->setLink( $rawData->getElementsByTagName('link')->item(0)->getAttribute('href') )
            ->setSummary( $rawData->getElementsByTagName('summary')->item(0)->textContent )
            ->setContent( $rawData->getElementsByTagName('content')->item(0)->textContent );
    }

}
