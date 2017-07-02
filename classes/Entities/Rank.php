<?php

namespace Entities;

/**
 * Data class for Diablo 3 ladder rank object
 */
class Rank {

    private $pos;
    private $level;
    private $time;
    private $completionTime;
    private $player;
    private $isMatch = false;
    
    /**
     * Returns true if the rank contains a player object that was matched by
     * at least one of the search pattern from ladder object.
     * @return boolean
     */
    public function isMatch() {
        return $this->isMatch;
    }
    
    /**
     * Marks the rank as match according to the search patterns of the ladder.
     * @param boolean $val
     */
    public function setMatch($val) {
        $this->isMatch = $val;
    }

    /**
     * Parses the rifts time and returns via sprintf pattern.
     * @param String $format Default: '%02d:%02d.%03d'
     * @return String
     */
    public function getTimeFormatted($format = '%02d:%02d.%03d') {
        return sprintf(
                $format,
                ($this->getTime()/1000/60)%60,
                ($this->getTime()/1000)%60,
                $this->getTime()%1000);
    }

    /**
     * Returns the completion data of the rank. Uses DateTime and its format method.
     * @param String $format Default: 'd.m.Y H:i:s'
     * @return String
     */
    public function getCompletionDate($format = 'd.m.Y H:i:s') {
        $date = new \DateTime();
        return $date->setTimestamp(floor($this->getCompletionTime()/1000))->format($format);
    }

    /**
     * 
     * @return int
     */
    public function getPos() {
        return $this->pos;
    }

    /**
     * 
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * Returns the rift's (rank) time as timestamp
     * @return int
     */
    public function getTime() {
        return $this->time;
    }

    /**
     * 
     * @return String
     */
    public function getCompletionTime() {
        return $this->completionTime;
    }

    /**
     * 
     * @return \Entities\Player
     */
    public function getPlayer() {
        return $this->player;
    }

    /**
     * Returns the isMatch flag
     * @return boolean
     */
    public function getIsMatch() {
        return $this->isMatch;
    }

    /**
     * 
     * @param int $pos
     * @return \Entities\Rank
     */
    public function setPos($pos) {
        $this->pos = $pos;
        return $this;
    }

    /**
     * 
     * @param int $level
     * @return \Entities\Rank
     */
    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    /**
     * 
     * @param int $time Timestamp
     * @return \Entities\Rank
     */
    public function setTime($time) {
        $this->time = $time;
        return $this;
    }

    /**
     * 
     * @param String $completionTime
     * @return \Entities\Rank
     */
    public function setCompletionTime($completionTime) {
        $this->completionTime = $completionTime;
        return $this;
    }

    /**
     * 
     * @param \Entities\Player $player
     * @return \Entities\Rank
     */
    public function setPlayer(\Entities\Player $player) {
        $this->player = $player;
        return $this;
    }

    /**
     * Same as setMatch method.
     * @param boolean $isMatch
     * @return \Entities\Rank
     */
    public function setIsMatch($isMatch) {
        $this->setMatch($isMatch);
        return $this;
    }

}
