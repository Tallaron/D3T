<?php

namespace Entities;

class SkillSet {

    private $skills = [];
    
    /**
     * Returns true if there is no skill in <b>$this</b> set.
     * @return boolean
     */
    public function isEmpty() {
        return empty($this->skills);
    }

    /**
     * 
     * @param \Entities\Skill $skill
     * @param int $index
     */
    public function addSkill(\Entities\Skill $skill, $index) {
        $this->skills[$index] = $skill;
    }

    /**
     * 
     * @param int $index
     * @return \Entities\Skill
     */
    public function getSkillAt($index) {
        return $this->skills[$index];
    }

    /**
     * Returns the array of \Entities\Skill.
     * @return array
     */
    public function getSkills() {
        return $this->skills;
    }

    /**
     * 
     * @param array $skills Array of \Entities\Skill
     * @return \Entities\SkillSet
     */
    public function setSkills($skills) {
        $this->skills = $skills;
        return $this;
    }


    
}
