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

}
