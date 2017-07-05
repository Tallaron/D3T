<?php


namespace Entities;

class PlayedTime {

    private $played;
    private $playedSum = 0;
    
    public function __construct() {
        $this->played['barbarian'] = 0;
        $this->played['crusader'] = 0;
        $this->played['demon-hunter'] = 0;
        $this->played['monk'] = 0;
        $this->played['necromancer'] = 0;
        $this->played['witch-doctor'] = 0;
        $this->played['wizard'] = 0;
    }
    
    /**
     * 
     * @param Double $val
     */
    public function addPlayed($val) {
        $this->setPlayedSum( $this->getPlayedSum() + $val );
    }
    
    /**
     * Returns the percentage value of a (hero class) specific played time value.
     * @param String $classKey The associative key for the representing hero class.
     * @param int $precicion Number of digits after the comma.
     * @return Double
     */
    public function getPlayedPercentage($classKey, $precicion = 1) {
        return number_format($this->getPlayed()[$classKey] / $this->getPlayedSum() * 100, $precicion);
    }
    
    /**
     * 
     * @param String $classKey
     * @return int
     */
    public function getPlayedNormalized($classKey) {
        return ceil($this->getPlayed()[$classKey] * 100);
    }

    /**
     * Returns an associative array with relative played times of all classes
     * @return mixed
     */
    public function getPlayed() {
        return $this->played;
    }

    /**
     * 
     * @param array $played
     * @return \Entities\Profile
     */
    public function setPlayed($key, $played) {
        $this->played[$key] = $played;
        return $this;
    }

    /**
     * 
     * @return Double
     */
    public function getPlayedSum() {
        return $this->playedSum;
    }

    /**
     * 
     * @param Double $playedSum
     * @return \Entities\Profile
     */
    public function setPlayedSum($playedSum) {
        $this->playedSum = $playedSum;
        return $this;
    }
    
}
