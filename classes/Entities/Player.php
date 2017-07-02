<?php

namespace Entities;

/**
 * Data class for Diablo 3 player of a ladder structure
 */
class Player {

    private $id;
    private $bTag;
    private $clanShort;
    private $clan;
    private $paragon = 0;
    private $heroClass;
    private $gender;
    private $unknown = false;

    /**
     * Default constructor that initializes the player object to a unknown
     * player. Sets the Battle#Tag to a default value and the unknown flag to true.
     */
    public function __construct() {
        $this->bTag = UNKNOWN_PLAYER_DEFAULT_BTAG;
        $this->setUnknown(true);
    }

    /**
     * Returns the players name. Name is taken from the Battle.Tag by exploding
     * it on '#' or '-'
     * @return String
     */
    public function getName() {
        if(substr_count($this->getBTag(), '#')) {
            return explode('#', $this->getBTag())[0];
        } else {
            return explode('-', $this->getBTag())[0];
        }
    }
    
    public function getIconFileName() {
        return str_replace(' ', '-', $this->getHeroClass()).'-'.($this->getGender()=='m'?0:1);
    }

        /**
     * Returns true, if the player is unknown, false if there was a valid
     * Battle.Tag given.
     * @return boolean
     */
    public function isUnknown() {
        return $this->getUnknown();
    }

    /**
     * Returns true, if there was a clan tag stored with a length of more than 0.
     * @return boolean
     */
    public function hasClan() {
        return strlen($this->getClanShort()) > 0 ? true : false;
    }

    /**
     * Returns the URL compatible Battle-Tag
     * @return String
     */
    public function getBTagMinus() {
        return str_replace('#', '-', $this->bTag);
    }

    /**
     * Returns the Battle#Tag in default format.
     * @return String
     */
    public function getBTag() {
        return str_replace('-', '#', $this->bTag);
    }

    /**
     * 
     * @return String
     */
    public function getClanShort() {
        return $this->clanShort;
    }

    /**
     * 
     * @return String
     */
    public function getClan() {
        return $this->clan;
    }

    /**
     * Returns the paragon level
     * @return int
     */
    public function getParagon() {
        return $this->paragon;
    }

    /**
     * Sets the Battle#Tag if it has a valid format.
     * @param type $bTag
     * @return \Entities\Player
     */
    public function setBTag($bTag) {
        if(substr_count($bTag, '#') > 0 || substr_count($bTag, '-') > 0) {
            $this->bTag = $bTag;
            $this->setUnknown(false);
        }
        return $this;
    }

    /**
     * 
     * @param String $clanShort
     * @return \Entities\Player
     */
    public function setClanShort($clanShort) {
        $this->clanShort = $clanShort;
        return $this;
    }

    /**
     * 
     * @param String $clan
     * @return \Entities\Player
     */
    public function setClan($clan) {
        $this->clan = $clan;
        return $this;
    }

    /**
     * Sets the paragon level.
     * @param int $paragon
     * @return \Entities\Player
     */
    public function setParagon($paragon) {
        $this->paragon = $paragon;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @param int $id
     * @return \Entities\Player
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Returns the unknown flag of the player.
     * @return boolean
     */
    public function getUnknown() {
        return $this->unknown;
    }

    /**
     * 
     * @param boolean $unknown
     * @return \Entities\Player
     */
    public function setUnknown($unknown) {
        $this->unknown = $unknown;
        return $this;
    }

    /**
     * 
     * @return String
     */
    public function getHeroClass() {
        return $this->heroClass;
    }

    /**
     * 
     * @return String Returns 'm' or 'f'
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * 
     * @param String $heroClass
     * @return \Entities\Player
     */
    public function setHeroClass($heroClass) {
        $this->heroClass = $heroClass;
        return $this;
    }

    /**
     * 
     * @param String $gender
     * @return \Entities\Player
     */
    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }


}
