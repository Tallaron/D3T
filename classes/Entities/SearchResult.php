<?php

namespace Entities;

class SearchResult {

    private $content;
    private $key;
    
    public function __construct($content) {
        $this->content = $content;
    }
    
    
    public function setKey($key) {
        $this->key = $key;
    }
    
    public function getKey() {
        return $this->key;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }


    
}
