<?php

namespace Entities;

/**
 * Data class for Blizzard news taken from their stream.
 */
class News {

    private $title;
    private $published;
    private $updated;
    private $id;
    private $link;
    private $summary;
    private $content;
    
    /**
     * 
     * @return String
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Returns the DateTime object with the datetime when the news was published.
     * @param String $format Default format is 'd.m.y'
     * @return \DateTime
     */
    public function getPublished($format = 'd.m.y') {
        return (new \DateTime($this->published))->format($format);
    }

    /**
     * Returns the DateTime object with the datetime when the news was
     * updated the last time.
     * @param String $format Default format is 'd.m.y'
     * @return \DateTime
     */
    public function getUpdated($format = 'd.m.y') {
        return (new \DateTime($this->updated))->format($format);
    }

    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Returns a link to an external source for the news.
     * @return String
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * 
     * @return String
     */
    public function getSummary() {
        return $this->summary;
    }

    /**
     * 
     * @return String
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * 
     * @param String $title
     * @return \Entities\News
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * 
     * @param String $published
     * @return \Entities\News
     */
    public function setPublished($published) {
        $this->published = $published;
        return $this;
    }

    /**
     * 
     * @param String $updated
     * @return \Entities\News
     */
    public function setUpdated($updated) {
        $this->updated = $updated;
        return $this;
    }

    /**
     * 
     * @param int $id
     * @return \Entities\News
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param String $link
     * @return \Entities\News
     */
    public function setLink($link) {
        $this->link = $link;
        return $this;
    }

    /**
     * 
     * @param String $summary
     * @return \Entities\News
     */
    public function setSummary($summary) {
        $this->summary = $summary;
        return $this;
    }

    /**
     * 
     * @param String $content
     * @return \Entities\News
     */
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

}
