<?php

namespace Entities;

class SlugItem {
    
    private $id;
    private $slug;
    private $name;
    private $set;

    public function getId() {
        return $this->id;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getSet() {
        return $this->set;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    public function setSet($set) {
        $this->set = $set;
        return $this;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}
