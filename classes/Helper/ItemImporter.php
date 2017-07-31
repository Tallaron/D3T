<?php

namespace Helper;

class ItemImporter extends AbstractImporter {

    private $itemType;
    private $url;
    private $dom;
    private $items = [];

    public function __construct($url) {
        $this->setUrl($url);
        $this->setDom( self::loadDomData( $this->getUrl() ) );
    }
    
    
    
    public function proceed() {
        $finder = new \DomXPath( $this->getDom() );
        $legendaryData = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' legendary ')]");
        $setData = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' set ')]");
        
        foreach($legendaryData as $data) {
            $item = new \Entities\ImportItem();
            $item
                ->setSlug( $this->parseItemSlug($data) )
                ->setName( $this->parseItemName($data) )
                ->setIcon( $this->parseItemIcon($data) )
                ->setLevel( $this->parseItemLevel($data) )
                ->setType( $this->getItemType() )
                ->setQuality( 'legendary' );
            $this->addItem($item);
        }

        foreach($setData as $data) {
            $item = new \Entities\ImportItem();
            $item
                ->setSlug( $this->parseItemSlug($data) )
                ->setName( $this->parseItemName($data) )
                ->setIcon( $this->parseItemIcon($data) )
                ->setLevel( $this->parseItemLevel($data) )
                ->setType( $this->getItemType() )
                ->setQuality( 'set' );
            $this->addItem($item);
        }
        
    }

    

    
    
    private function parseItemSlug($data) {
        return self::getLastElement( $data
                                ->getElementsByTagName('h3')[0]
                                ->getElementsByTagName('a')[0]
                                ->getAttribute('href'));
    }

    private function parseItemName($data) {
        return $data
                ->getElementsByTagName('h3')[0]
                ->getElementsByTagName('a')[0]
                ->nodeValue;
    }

    private function parseItemIcon($data) {
        return self::getLastElement( explode('.png', $data
                                        ->getElementsByTagName('a')[0]
                                        ->getElementsByTagName('span')[2]
                                        ->getAttribute('style'))[0]);
    }

    private function parseItemLevel($data) {
        return $data
                ->getElementsByTagName('h3')[1]
                ->nodeValue;
    }

    
    
    private function addItem($item) {
        $this->items[] = $item;
    }

    

    public function getItemType() {
        return $this->itemType;
    }

    public function setItemType($itemType) {
        $this->itemType = $itemType;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function getDom() {
        return $this->dom;
    }

    public function setDom($dom) {
        $this->dom = $dom;
        return $this;
    }

    public function getItems() {
        return $this->items;
    }

    public function setItems($items) {
        $this->items = $items;
        return $this;
    }


    
}
