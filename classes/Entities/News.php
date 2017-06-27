<?php

namespace Entities;

class News {

    private $title;
    private $published;
    private $updated;
    private $id;
    private $link;
    private $summary;
    private $content;
    
    public function getTitle() {
        return $this->title;
    }

    public function getPublished($format = 'd.m.y') {
        return (new \DateTime($this->published))->format($format);
    }

    public function getUpdated($format = 'd.m.y') {
        return (new \DateTime($this->updated))->format($format);
    }

    public function getId() {
        return $this->id;
    }

    public function getLink() {
        return $this->link;
    }

    public function getSummary() {
        return $this->summary;
    }

    public function getContent() {
        return $this->content;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setPublished($published) {
        $this->published = $published;
        return $this;
    }

    public function setUpdated($updated) {
        $this->updated = $updated;
        return $this;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setLink($link) {
        $this->link = $link;
        return $this;
    }

    public function setSummary($summary) {
        $this->summary = $summary;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

}
