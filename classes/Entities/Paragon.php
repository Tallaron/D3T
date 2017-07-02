<?php

namespace Entities;

/**
 * Data class for a paragon level. Contains the level and xp value.
 */
class Paragon {

    private $level;
    private $xp;
    
    /**
     * 
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * 
     * @return double
     */
    public function getXp() {
        return $this->xp;
    }
    
    /**
     * 
     * @return String number_format($double, 0, '.', ',')
     */
    public function getXpFormated() {
        return number_format($this->getXp(), 0, '.', ',');
    }

    /**
     * 
     * @param int $level
     * @return \Entities\Paragon
     */
    public function setLevel($level) {
        $this->level = max(MIN_PARAGON, min(MAX_PARAGON, $level));
        return $this;
    }

    /**
     * 
     * @param double $xp
     * @return \Entities\Paragon
     */
    public function setXp($xp) {
        $this->xp = $xp;
        return $this;
    }
    
}
