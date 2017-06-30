<?php

namespace Entities;

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


    
    
    
    public function getMainHand() {
        return $this->mainHand;
    }

    public function getOffHand() {
        return $this->offHand;
    }

    public function getLeftFinger() {
        return $this->leftFinger;
    }

    public function getRightFinger() {
        return $this->rightFinger;
    }

    public function getNeck() {
        return $this->neck;
    }

    public function getHead() {
        return $this->head;
    }

    public function getTorso() {
        return $this->torso;
    }

    public function getWaist() {
        return $this->waist;
    }

    public function getLegs() {
        return $this->legs;
    }

    public function getFeet() {
        return $this->feet;
    }

    public function getShoulders() {
        return $this->shoulders;
    }

    public function getHands() {
        return $this->hands;
    }

    public function getBracers() {
        return $this->bracers;
    }

    public function setMainHand($mainHand) {
        $this->mainHand = $mainHand;
        return $this;
    }

    public function setOffHand($offHand) {
        $this->offHand = $offHand;
        return $this;
    }

    public function setLeftFinger($leftFinger) {
        $this->leftFinger = $leftFinger;
        return $this;
    }

    public function setRightFinger($rightFinger) {
        $this->rightFinger = $rightFinger;
        return $this;
    }

    public function setNeck($neck) {
        $this->neck = $neck;
        return $this;
    }

    public function setHead($head) {
        $this->head = $head;
        return $this;
    }

    public function setTorso($torso) {
        $this->torso = $torso;
        return $this;
    }

    public function setWaist($waist) {
        $this->waist = $waist;
        return $this;
    }

    public function setLegs($legs) {
        $this->legs = $legs;
        return $this;
    }

    public function setFeet($feet) {
        $this->feet = $feet;
        return $this;
    }

    public function setShoulders($shoulders) {
        $this->shoulders = $shoulders;
        return $this;
    }

    public function setHands($hands) {
        $this->hands = $hands;
        return $this;
    }

    public function setBracers($bracers) {
        $this->bracers = $bracers;
        return $this;
    }


    
}
