<?php

namespace Mappers;

/**
 * Mapper for \Entities\NewsFeed
 */
abstract class NewsFeedMapper {

    /**
     * 
     * @param String $url News Feed URL -  Should be a valid XML document
     * @return \Entities\NewsFeed
     */
    public static function createObject($url) {
        $newsFeed = new \Entities\NewsFeed();
        try {
            $domObj = new \DOMDocument();
            $domObj->loadXML(file_get_contents($url));
            self::createNews( $domObj->getElementsByTagName('entry'), $newsFeed );
        } catch(\Exception $e) {
            self::createNews( new \DOMNodeList(), $newsFeed );
        }
        return $newsFeed;
    }

    
    /**
     * 
     * @param \DOMNodeList $entries
     * @param \Entities\NewsFeed $newsFeed
     */
    private static function createNews(\DOMNodeList $entries, \Entities\NewsFeed $newsFeed) {
        foreach($entries as $entry) {
            $newsFeed->addNews( \Mappers\NewsMapper::createObj($entry) );
        }
    }

}
