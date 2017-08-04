<?php

namespace Helper;

class GemImporter extends AbstractImporter {

    private $url;
    private $dom;
    private $gems = [];

    public function __construct() {
        $this->setUrl( GEM_IMPORT_URL );
        $this->setDom( self::loadDomData( $this->getUrl() ) );
    }
    
    
    
    public function proceed() {
        $finder = new \DomXPath( $this->getDom() );
        $gemData = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' data-cell ')]");
        
        foreach($gemData as $data) {
            $gem = new \Entities\ImportGem();
            $icon = $this->parseGemIcon($data);
            $type = $this->parseGemType($icon);
            $gem
                ->setSlug( $this->parseGemSlug($data) )
                ->setName( $this->parseGemName($data) )
                ->setIcon( $icon )
                ->setType( $type )
                ->setLevel( $type != 'legendary' ? $this->parseGemLevel($icon) : 1 );
            $this->addGem($gem);
        }

        
    }

    

    
    
    private function parseGemSlug($data) {
        return self::getLastElement( $data
                                ->getElementsByTagName('a')[0]
                                ->getAttribute('href'));
    }

    private function parseGemName($data) {
        $parts = explode(' ', $data->getAttribute('data-raw'));
        $result = [];
        for($i=0; $i<count($parts)/2; $i++) {
            $result[] = ucfirst($parts[$i]);
        }
        return implode(' ', $result);
    }

    private function parseGemIcon($data) {
        return self::getLastElement( explode('.png', $data
                                        ->getElementsByTagName('a')[0]
                                        ->getElementsByTagName('span')[2]
                                        ->getAttribute('style'))[0]);
    }
    
    private function parseGemType($icon) {
        if(strpos(strtolower($icon), 'unique') !== false) {
            return 'legendary';
        } return 'default';
    }
    
    private function parseGemLevel($icon) {
        $start = preg_split('/_[0-9]{1,}_/', $icon)[0];
        $end = preg_split('/_[0-9]{1,}_/', $icon)[1];
        $rest = str_replace($start, '', $icon);
        $rest = str_replace($end, '', $rest);
        return (int) trim($rest, '_');
        
    }

    


    private function addGem($gem) {
        $this->gems[] = $gem;
    }

    

    public function getUrl() {
        return $this->url;
    }

    public function getDom() {
        return $this->dom;
    }

    public function getGems() {
        return $this->gems;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function setDom($dom) {
        $this->dom = $dom;
        return $this;
    }

    public function setGems($gems) {
        $this->gems = $gems;
        return $this;
    }

}
