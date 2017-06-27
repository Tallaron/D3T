<?php

namespace Mappers;

class NewsMapper {

    private $news;
    
    public function createNews($rawData) {
        $this->news = new \Entities\News();
        $this->news
            ->setTitle( $rawData->getElementsByTagName('title')->item(0)->textContent )
            ->setPublished( $rawData->getElementsByTagName('published')->item(0)->textContent )
            ->setUpdated( $rawData->getElementsByTagName('updated')->item(0)->textContent )
            ->setId( $rawData->getElementsByTagName('id')->item(0)->textContent )
            ->setLink( $rawData->getElementsByTagName('link')->item(0)->getAttribute('href') )
            ->setSummary( $rawData->getElementsByTagName('summary')->item(0)->textContent )
            ->setContent( $rawData->getElementsByTagName('content')->item(0)->textContent );
    }
    
    public function getNews() {
        return $this->news;
    }

    public function setNews($news) {
        $this->news = $news;
        return $this;
    }


    
}
