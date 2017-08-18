<?php

namespace Entities;

/**
 * Data class for Diablo 3 gem or legendary gem, e.g. 'Taeguk'
 */
class Gem {

    private $id = -1;
    private $type;
    private $name = EMPTY_ITEM_DEFAULT_NAME;
    private $icon = false;
    private $displayColor = EMPTY_ITEM_DEFAULT_DISPLAY_COLOR;
    private $tooltipParams = EMPTY_ITEM_DEFAULT_TOOLTIP_PARAMS;
    private $index;
    private $slug;
    private $level = 1;

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
     * @return String Defaults to 0.
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
     * @return String Returns the filename of the icon image w/o extention or/and path
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * 
     * @return String white, blue, yellow etc.
     */
    public function getDisplayColor() {
        return $this->displayColor;
    }

    /**
     * 
     * @return String Returns the encrypted item details with leading 'item/' string
     */
    public function getTooltipParams() {
        return $this->tooltipParams;
    }

    /**
     * 
     * @param String $id
     * @return \Entities\Gem
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\Gem
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $icon
     * @return \Entities\Gem
     */
    public function setIcon($icon) {
        $this->icon = $icon;
        return $this;
    }

    /**
     * 
     * @param String $displayColor
     * @return \Entities\Gem
     */
    public function setDisplayColor($displayColor) {
        $this->displayColor = $displayColor;
        return $this;
    }

    /**
     * 
     * @param String $tooltipParams
     * @return \Entities\Gem
     */
    public function setTooltipParams($tooltipParams) {
        $this->tooltipParams = $tooltipParams;
        return $this;
    }
    
    /**
     * 
     * @return \Entities\Gem
     */
    public function getType() {
        return $this->type;
    }

    /**
     * 
     * @param String $type
     * @return \Entities\Gem
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getIndex() {
        return $this->index;
    }

    /**
     * 
     * @param int $Index
     * @return \Entities\Gem
     */
    public function setIndex($index) {
        $this->index = $index;
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
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * 
     * @param String $slug
     * @return \Entities\Gem
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @param int $level
     * @return \Entities\Gem
     */
    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

}
