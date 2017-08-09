<?php

namespace Mappers;

/**
 * Mapper for \Entities\PassiveSkill
 */
abstract class PassiveSkillMapper {

    /**
     * 
     * @param StdObject $data From json_decode
     * @return \Entities\PassiveSkill
     */
    public static function createObj($data) {
        $skill = null;
        if(property_exists($data, 'skill')) {
            $skill = new \Entities\PassiveSkill();
            self::setSkillData($skill, $data->skill);
        }
        return $skill;
    }
    
    private static function setSkillData(\Entities\PassiveSkill $skill, $data) {
        $skill
            ->setSlug($data->slug)
            ->setName($data->name)
            ->setIcon($data->icon)
            ->setTooltipUrl($data->tooltipUrl)
            ->setDescription($data->description);
    }

}
