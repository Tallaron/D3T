<?php

namespace Entities;

class ItemType {

    private $id;
    private $key;
    private $name;
    private $slotKey;
    private $sockets;
    private $classKey;
    
    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @return String
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * 
     * @return String
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @return String
     */
    public function getSlotKey() {
        return $this->slotKey;
    }
    
    /**
     * 
     * @return int
     */
    public function getSockets() {
        return $this->sockets;
    }

    /**
     * 
     * @return String
     */
    public function getClassKey() {
        return $this->classKey;
    }

    /**
     * 
     * @param int $id
     * @return \Entities\ItemType
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param String $key
     * @return \Entities\ItemType
     */
    public function setKey($key) {
        $this->key = $key;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\ItemType
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $slotKey
     * @return \Entities\ItemType
     */
    public function setSlotKey($slotKey) {
        $this->slotKey = $slotKey;
        return $this;
    }

    /**
     * 
     * @param int $sockets
     * @return \Entities\ItemType
     */
    public function setSockets($sockets) {
        $this->sockets = $sockets;
        return $this;
    }

    /**
     * 
     * @param String $classKey
     * @return \Entities\ItemType
     */
    public function setClassKey($classKey) {
        $this->classKey = $classKey;
        return $this;
    }

}
