<?php

namespace Mappers;

class EditorSkillSetMapper {

    public static function createObject($data) {
        $obj = new \Entities\EditorSkillSet();


        foreach($data as $skill) {
            $obj->addSkills($skill, $skill->getIndex());
        }

        return $obj;
    }
    
}
