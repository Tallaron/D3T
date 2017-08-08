<?php

namespace Entities;

abstract class AbstractSkill {

    /**
     * returns Blizzard cdn image url for large icon
     * @return String
     */
    public function getLargeIconUrl() {
        return BLIZZARD_D3_SKILL_BASE_PATH . '42/' . strtolower($this->getIcon()) . '.png';
    }

    /**
     * returns Blizzard cdn image url for small icon
     * @return String
     */
    public function getSmallIconUrl() {
        return BLIZZARD_D3_SKILL_BASE_PATH . '21/' . strtolower($this->getIcon()) . '.png';
    }
    
}
