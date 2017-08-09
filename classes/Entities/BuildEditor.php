<?php

namespace Entities;

class BuildEditor {

    private $build;
    private $runeLists;

    /**
     * Returns an array of \Entities\Rune from the given <b>$index</b> of the
     * <b>$runeLists</b>-array.
     * @param int $index
     * @return array
     */
    public function getRuneList($index) {
        return $this->runeLists[$index];
    }
    
    /**
     * 
     * @return \Entities\Build
     */
    public function getBuild() {
        return $this->build;
    }

    /**
     * Returns the whole array with all relevant runeLists.
     * @return array
     */
    public function getRuneLists() {
        return $this->runeLists;
    }

    /**
     * 
     * @param \Entities\Build $build
     * @return \Entities\BuildEditor
     */
    public function setBuild($build) {
        $this->build = $build;
        return $this;
    }

    /**
     * 
     * @param array $runeLists
     * @return \Entities\BuildEditor
     */
    public function setRuneLists(array $runeLists) {
        $this->runeLists = $runeLists;
        return $this;
    }

}
