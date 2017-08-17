<?php
namespace Entities;

class ScopeList {

    private $bounty = -1;
    private $key = -1;
    private $lowgr = -1;
    private $push = -1;
    
    public function get($key) {
        $method = 'get'.ucfirst($key);
        return method_exists($this, $method) ? $this->$method() : false;
    }

    public function getBounty() {
        return $this->bounty;
    }

    public function getKey() {
        return $this->key;
    }

    public function getLowgr() {
        return $this->lowgr;
    }

    public function getPush() {
        return $this->push;
    }

    public function setBounty($bounty) {
        $this->bounty = $bounty;
        return $this;
    }

    public function setKey($key) {
        $this->key = $key;
        return $this;
    }

    public function setLowgr($lowgr) {
        $this->lowgr = $lowgr;
        return $this;
    }

    public function setPush($push) {
        $this->push = $push;
        return $this;
    }

}
