<?php

namespace Entities;

/**
 * Data class for the hero's inventory, containing several \Entities\Item objects.
 * The inventory is initialized with default \Entities\Item objects.
 */
class Inventory {

    private $mainHand;
    private $offHand;
    private $leftFinger;
    private $rightFinger;
    private $neck;
    private $head;
    private $torso;
    private $waist;
    private $legs;
    private $feet;
    private $shoulders;
    private $hands;
    private $bracers;
    
    
    public function __construct() {
        $emptyItem = new \Entities\Item();
        $this->mainHand = $emptyItem;
        $this->offHand = $emptyItem;
        $this->leftFinger = $emptyItem;
        $this->rightFinger = $emptyItem;
        $this->neck = $emptyItem;
        $this->head = $emptyItem;
        $this->torso = $emptyItem;
        $this->waist = $emptyItem;
        $this->legs = $emptyItem;
        $this->feet = $emptyItem;
        $this->shoulders = $emptyItem;
        $this->hands = $emptyItem;
        $this->bracers = $emptyItem;
    }
    
    /**
     * Returns the \Entities\Item according to the given <b>$key</b>. If <b>$key</b>
     * isn't valid the method returns false.
     * @param String $key
     * @return mixed
     */
    public function get($key) {
        if(property_exists($this, $key)) {
            return $this->$key;
        } return false;
    }

        /**
     * 
     * @return \Entities\Item
     */
    public function getMainHand() {
        return $this->mainHand;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getOffHand() {
        return $this->offHand;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getLeftFinger() {
        return $this->leftFinger;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getRightFinger() {
        return $this->rightFinger;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getNeck() {
        return $this->neck;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getHead() {
        return $this->head;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getTorso() {
        return $this->torso;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getWaist() {
        return $this->waist;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getLegs() {
        return $this->legs;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getFeet() {
        return $this->feet;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getShoulders() {
        return $this->shoulders;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getHands() {
        return $this->hands;
    }

    /**
     * 
     * @return \Entities\Item
     */
    public function getBracers() {
        return $this->bracers;
    }

    /**
     * 
     * @param \Entities\Item $mainHand
     * @return \Entities\Inventory
     */
    public function setMainHand(\Entities\Item $mainHand) {
        $this->mainHand = $mainHand;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $offHand
     * @return \Entities\Inventory
     */
    public function setOffHand(\Entities\Item $offHand) {
        $this->offHand = $offHand;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $leftFinger
     * @return \Entities\Inventory
     */
    public function setLeftFinger(\Entities\Item $leftFinger) {
        $this->leftFinger = $leftFinger;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $rightFinger
     * @return \Entities\Inventory
     */
    public function setRightFinger(\Entities\Item $rightFinger) {
        $this->rightFinger = $rightFinger;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $neck
     * @return \Entities\Inventory
     */
    public function setNeck(\Entities\Item $neck) {
        $this->neck = $neck;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $head
     * @return \Entities\Inventory
     */
    public function setHead(\Entities\Item $head) {
        $this->head = $head;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $torso
     * @return \Entities\Inventory
     */
    public function setTorso(\Entities\Item $torso) {
        $this->torso = $torso;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $waist
     * @return \Entities\Inventory
     */
    public function setWaist(\Entities\Item $waist) {
        $this->waist = $waist;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $legs
     * @return \Entities\Inventory
     */
    public function setLegs(\Entities\Item $legs) {
        $this->legs = $legs;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $feet
     * @return \Entities\Inventory
     */
    public function setFeet(\Entities\Item $feet) {
        $this->feet = $feet;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $shoulders
     * @return \Entities\Inventory
     */
    public function setShoulders(\Entities\Item $shoulders) {
        $this->shoulders = $shoulders;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $hands
     * @return \Entities\Inventory
     */
    public function setHands(\Entities\Item $hands) {
        $this->hands = $hands;
        return $this;
    }

    /**
     * 
     * @param \Entities\Item $bracers
     * @return \Entities\Inventory
     */
    public function setBracers(\Entities\Item $bracers) {
        $this->bracers = $bracers;
        return $this;
    }
    
}
