<?php


namespace Mappers;

class newsFeedMapper {

    private $newsFeed;
    
    public function __construct($url) {
        $this->newsFeed = new \Entities\NewsFeed();
        try {
            $domObj = new \DOMDocument();
            $domObj->loadXML(file_get_contents($url));
            $this->createNews( $domObj->getElementsByTagName('entry') );
        } catch(\Exception $e) {
            $this->createNews( new \DOMNodeList() );
        }
    }

    
    
    private function createNews($entries) {
        foreach($entries as $entry) {
            $nm = new \Mappers\NewsMapper();
            $nm->createNews($entry);
            $this->newsFeed->addNews($nm->getNews());
        }
    }

    







    public function getNewsFeed() {
        return $this->newsFeed;
    }

    public function setNewsFeed($newsFeed) {
        $this->newsFeed = $newsFeed;
        return $this;
    }


    
    
    
    
}
