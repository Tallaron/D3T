<?php

namespace Entities;

class EditorInventory {

    private $head;
    private $torso;
    private $waist;
    private $legs;
    private $feet;
    private $shoulders;
    private $hands;
    private $leftFinger;
    private $rightFinger;
    private $mainHand;
    private $offHand;
    private $bracers;
    private $neck;

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

    public function getLeftFinger() {
        return $this->leftFinger;
    }

    public function getRightFinger() {
        return $this->rightFinger;
    }

    public function getMainHand() {
        return $this->mainHand;
    }

    public function getOffHand() {
        return $this->offHand;
    }

    public function getBracers() {
        return $this->bracers;
    }

    public function getNeck() {
        return $this->neck;
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

    public function setLeftFinger($leftFinger) {
        $this->leftFinger = $leftFinger;
        return $this;
    }

    public function setRightFinger($rightFinger) {
        $this->rightFinger = $rightFinger;
        return $this;
    }

    public function setMainHand($mainHand) {
        $this->mainHand = $mainHand;
        return $this;
    }

    public function setOffHand($offHand) {
        $this->offHand = $offHand;
        return $this;
    }

    public function setBracers($bracers) {
        $this->bracers = $bracers;
        return $this;
    }

    public function setNeck($neck) {
        $this->neck = $neck;
        return $this;
    }

    public function get($key) {
        $method = 'get'. ucfirst($key);
        if(method_exists($this, $method)) {
            return $this->$method();
        } return false;
    }

}
