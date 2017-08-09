<?php

namespace Entities;

/**
 * Data class for Diablo 3 items, e.g. 'Nemesis Bracers'
 */
class Item {

    private $id = 0;
    private $name = EMPTY_ITEM_DEFAULT_NAME;
    private $icon = false;
    private $displayColor = EMPTY_ITEM_DEFAULT_DISPLAY_COLOR;
    private $tooltipParams = EMPTY_ITEM_DEFAULT_TOOLTIP_PARAMS;
    private $sockets = 0;
    private $gems = [];
    private $quality;
    private $level;
    private $slug;
    private $type;

    /**
     * returns Blizzard cdn image url for large icon
     * @return String
     */
    public function getLargeIconUrl() {
        return BLIZZARD_D3_ITEM_BASE_PATH . 'large/' . strtolower($this->getIcon()) . '.png';
    }

    /**
     * returns Blizzard cdn image url for small icon
     * @return String
     */
    public function getSmallIconUrl() {
        return BLIZZARD_D3_ITEM_BASE_PATH . 'small/' . strtolower($this->getIcon()) . '.png';
    }
    
    /**
     * Check the item's icon string for occurance of '2h' to determine if it is a two-handed weapon or not
     * @return boolean
     */
    public function isTwohand() {
        if($this->getIcon() != false) {
            return substr_count(strtolower($this->getIcon()), '2h') > 0 ? true : false;
        } return false;
    }

        /**
     * Returns link for the item leading to the official game guide
     * @return String
     */
    public function getLink() {
        return D3_GAME_GUIDE_ITEM_BASE_URL.strtolower( 
                str_replace(' ', '-', 
                        str_replace('\'', '', 
                                $this->getName() ) ) );
    }

        /**
     * 
     * @return boolean
     */
    public function hasSockets() {
        return $this->getSockets() > 0 ? true : false;
    }

        /**
     * Puts a gem object into the gem's array
     * @param \Entities\Gem $gem
     */
    public function addGem(\Entities\Gem $gem) {
        $this->gems[] = $gem;
    }
    
    /**
     * 
     * @param index $index
     * @return \Entities\Gem Returns the gem object from the possition given by index
     */
    public function getGemAt($index) {
        return array_key_exists($index, $this->getGems()) ? $this->gems[$index] : new \Entities\Item();
    }

    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @return String
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @return String
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * 
     * @return String
     */
    public function getDisplayColor() {
        return $this->displayColor;
    }

    /**
     * 
     * @return String
     */
    public function getTooltipParams() {
        return $this->tooltipParams;
    }

    /**
     * 
     * @param String $id
     * @return \Entities\Item
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\Item
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $icon
     * @return \Entities\Item
     */
    public function setIcon($icon) {
        $this->icon = $icon;
        return $this;
    }

    /**
     * 
     * @param String $displayColor
     * @return \Entities\Item
     */
    public function setDisplayColor($displayColor) {
        $this->displayColor = $displayColor;
        return $this;
    }

    /**
     * 
     * @param String $tooltipParams
     * @return \Entities\Item
     */
    public function setTooltipParams($tooltipParams) {
        $this->tooltipParams = $tooltipParams;
        return $this;
    }
    
    /**
     * 
     * @return array Returns an array of \Entities\Gem objects.
     */
    public function getGems() {
        return $this->gems;
    }

    /**
     * Awaits an array with \Entities\Gem objects.
     * @param array $gems
     * @return \Entities\Item
     */
    public function setGems($gems) {
        $this->gems = $gems;
        return $this;
    }

    /**
     * Returns the number of availabe sockets.
     * @return int
     */
    public function getSockets() {
        return $this->sockets;
    }

    /**
     * Sets the number of available sockets.
     * @param int $sockets
     * @return \Entities\Item
     */
    public function setSockets($sockets) {
        $this->sockets = $sockets;
        return $this;
    }

    /**
     * 
     * @return String
     */
    public function getQuality() {
        return $this->quality;
    }

    /**
     * 
     * @param String $quality
     * @return \Entities\Item
     */
    public function setQuality($quality) {
        $this->quality = $quality;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * 
     * @param int $level
     * @return \Entities\Item
     */
    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    /**
     * 
     * @return String
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * 
     * @return String
     */
    public function getType() {
        return $this->type;
    }

    /**
     * 
     * @param String $slug
     * @return \Entities\Item
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @param String $type
     * @return \Entities\Item
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }

}
