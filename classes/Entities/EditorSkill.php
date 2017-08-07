<?php

namespace Entities;

class EditorSkill {

    private $skillId = -1;
    private $runeId = -1;
    private $index;


    public function getSkillId() {
        return $this->skillId;
    }

    public function getRuneId() {
        return $this->runeId;
    }

    public function setSkillId($skillId) {
        $this->skillId = $skillId;
        return $this;
    }

    public function setRuneId($runeId) {
        $this->runeId = $runeId;
        return $this;
    }
    
    public function getIndex() {
        return $this->index;
    }

    public function setIndex($index) {
        $this->index = $index;
        return $this;
    }

}
