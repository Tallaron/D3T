<?php

namespace Mappers;

/**
 * Mapper for \Entities\ActiveSkill
 */
abstract class ActiveSkillMapper {

    /**
     * 
     * @param StdObject $data From json_decode
     * @return \Entities\ActiveSkill
     */
    public static function createObj($data) {
        $skill = null;
        if(property_exists($data, 'skill')) {
            $skill = new \Entities\Skill();
            self::setSkillData($skill, $data->skill);
        }
        if(property_exists($data, 'rune')) {
            self::setSkillRune($skill, $data->rune);
        }
        return $skill;
    }
    
    private static function setSkillData(\Entities\Skill $skill, $data) {
        $skill
            ->setSlug($data->slug)
            ->setName($data->name)
            ->setIcon($data->icon)
            ->setTooltipUrl($data->tooltipUrl)
            ->setDescription($data->description)
            ->setSimpleDescription($data->simpleDescription);
    }
    
    private static function setSkillRune(\Entities\Skill $skill, $data) {
        $skill->setRune( \Mappers\RuneMapper::createObj($data) );
    }
    
}
