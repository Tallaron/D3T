<?php

namespace Entities;

class EditorSkillSet {

    private $skills = [];
    
    public function isEmpty() {
        return empty($this->skills);
    }

    public function addSkills($skill, $index) {
        $this->skills[$index] = $skill;
    }

    public function getSkillAt($index) {
        return $this->skills[$index];
    }

    public function getSkills() {
        return $this->skills;
    }

    public function setSkills($skills) {
        $this->skills = $skills;
        return $this;
    }


    
}
