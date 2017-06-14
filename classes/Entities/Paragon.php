<?php

namespace Entities;

class Paragon {

    private $level;
    private $xp;
    
    public function getLevel() {
        return $this->level;
    }

    public function getXp() {
        return $this->xp;
    }
    
    public function getXpFormated() {
        return number_format($this->getXp(), 0, ".", ",");
    }

    public function setLevel($level) {
        $this->level = max(MIN_PARAGON, min(MAX_PARAGON, $level));
        return $this;
    }

    public function setXp($xp) {
        $this->xp = $xp;
        return $this;
    }
    
}
