<?php

namespace Entities;

/**
 * Data class for Diablo 3 skill rune. Only relevant for active skills.
 */
class Rune {

    private $slug;
    private $name;
    private $description;
    private $simpleDescription;
    private $tooltipParams;
    
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
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @return String
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * 
     * @return String
     */
    public function getSimpleDescription() {
        return $this->simpleDescription;
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
     * @param String $slug
     * @return \Entities\Rune
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @param String $name
     * @return \Entities\Rune
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param String $description
     * @return \Entities\Rune
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * 
     * @param String $simpleDescription
     * @return \Entities\Rune
     */
    public function setSimpleDescription($simpleDescription) {
        $this->simpleDescription = $simpleDescription;
        return $this;
    }

    /**
     * 
     * @param String $tooltipParams
     * @return \Entities\Rune
     */
    public function setTooltipParams($tooltipParams) {
        $this->tooltipParams = $tooltipParams;
        return $this;
    }

}
