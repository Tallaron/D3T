<?php

namespace Entities;

/**
 * Data class for NewsFeed, containing an array of News.
 */
class NewsFeed {

    private $data = [];

    /**
     * 
     * @param \Entities\News $news
     */
    public function addNews(\Entities\News $news) {
        $this->data[] = $news;
    }
    
    /**
     * Returns a news at the given index.
     * @param int $index
     * @return \Entities\News
     */
    public function getItem($index) {
        return $this->data[$index];
    }

    /**
     * Returns the number of available news.
     * @return int
     */
    public function getLength() {
        return count($this->getData());
    }

    /**
     * Returns the array of \Entities\News objects.
     * @return array
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Awaits and overrides an array of \Entities\News objects.
     * @param array $data
     * @return \Entities\NewsFeed
     */
    public function setData($data) {
        $this->data = $data;
        return $this;
    }

}
