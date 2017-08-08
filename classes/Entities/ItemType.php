<?php

namespace Entities;

class ItemType {

    private $id;
    private $key;
    private $name;
    private $slotKey;
    private $sockets;
    private $classKey;
    
    public function getId() {
        return $this->id;
    }

    public function getKey() {
        return $this->key;
    }

    public function getName() {
        return $this->name;
    }

    public function getSlotKey() {
        return $this->slotKey;
    }

    public function getSockets() {
        return $this->sockets;
    }

    public function getClassKey() {
        return $this->classKey;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setKey($key) {
        $this->key = $key;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setSlotKey($slotKey) {
        $this->slotKey = $slotKey;
        return $this;
    }

    public function setSockets($sockets) {
        $this->sockets = $sockets;
        return $this;
    }

    public function setClassKey($classKey) {
        $this->classKey = $classKey;
        return $this;
    }

}
