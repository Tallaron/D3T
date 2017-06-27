<?php

namespace Entities;

class NewsFeed {

    private $data = [];


    public function addNews($news) {
        $this->data[] = $news;
    }

    

    
    
    public function getItem($index) {
        return $this->data[$index];
    }


    public function getLength() {
        return count($this->getData());
    }

    

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

}
