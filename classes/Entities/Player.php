<?php

namespace Entities;

class Player {

    private $id;
    private $bTag;
    private $clanShort;
    private $clan;
    private $paragon = 0;
    private $class = false;
    private $unknown = false;

    public function __construct() {
        $this->bTag = '~Unknown~#0000';
        $this->setUnknown(true);
    }

    public function getName() {
        return explode('#', $this->getBTag())[0];
    }
    
    public function isUnknown() {
        return $this->getUnknown();
    }

    public function hasClan() {
        return strlen($this->getClanShort()) > 0 ? true : false;
    }

    public function getBTagMinus() {
        return str_replace('#', '-', $this->getBTag());
    }

    public function getBTag() {
        return $this->bTag;
    }

    public function getClanShort() {
        return $this->clanShort;
    }

    public function getClan() {
        return $this->clan;
    }

    public function getParagon() {
        return $this->paragon;
    }

    public function getClass() {
        return $this->class;
    }

    public function setBTag($bTag) {
        if(substr_count($bTag, '#') > 0) {
            $this->bTag = $bTag;
            $this->setUnknown(false);
        }
        return $this;
    }

    public function setClanShort($clanShort) {
        $this->clanShort = $clanShort;
        return $this;
    }

    public function setClan($clan) {
        $this->clan = $clan;
        return $this;
    }

    public function setParagon($paragon) {
        $this->paragon = $paragon;
        return $this;
    }

    public function setClass($class) {
        $this->class = $class;
        return $this;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getUnknown() {
        return $this->unknown;
    }

    public function setUnknown($unknown) {
        $this->unknown = $unknown;
        return $this;
    }



}
