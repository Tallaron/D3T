<?php

namespace Mappers;

class BuildMapper {
    
    /**
     * 
     * @param StdObject $data From PDO::fetch
     * @return \Entities\Build
     */
    public static function createObject($buildId) {
        $build = \Mappers\BuildDBMapper::findBuildMetaById($buildId);
        $build
            ->setInventory(\Mappers\InventoryMapper::createObj(
                                    \Mappers\BuildDBMapper::findInventoryByBuildId($buildId)))
            ->setCube(\Mappers\CubeMapper::createObj(
                                    \Mappers\BuildDBMapper::findCubeByBuildId($buildId)))
            ->setActiveSkills( self::loadActiveSkillSet(\Mappers\BuildDBMapper::findActiveSkillsByBuildId($buildId)) )
            ->setPassiveSkills( self::loadPassiveSkillSet(\Mappers\BuildDBMapper::findPassiveSkillsByBuildId($buildId)) );
        $build->setRuneLists( self::loadRuneLists($build) );
        return $build;
    }
    
    
    
    
    public static function loadRuneLists($build) {
        $runeLists = [];
        foreach($build->getActiveSkills()->getSkills() as $activeSkill) {
            if($activeSkill->getId() != -1) {
                $runeLists[$activeSkill->getIndex()] = \Mappers\DBMapper::findRawRunesBySkillId( $activeSkill->getId() );
            }
        }
        return $runeLists;
    }
    
    private static function loadActiveSkillSet(array $skillsData) {
        $ss = new \Entities\SkillSet();
        foreach($skillsData as $skillData) {
            if($skillData->skillId != -1) {
                $skill = \Mappers\BuildDBMapper::findAktiveSkillById( $skillData->skillId );
                $skill->setIndex($skillData->index);
                $rune = \Mappers\BuildDBMapper::findRuneById($skillData->runeId);
                $skill->setRune($rune ? $rune : new \Entities\Rune());
            } else {
                $skill = new \Entities\Skill();
            }
            $ss->addSkill($skill, $skillData->index);
        }
        return $ss;
    }
    
    private static function loadPassiveSkillSet(array $skillsData) {
        $ss = new \Entities\SkillSet();
        foreach($skillsData as $skillData) {
            if($skillData->skillId != -1) {
                $skill = \Mappers\BuildDBMapper::findAktiveSkillById( $skillData->skillId );
                $skill->setIndex($skillData->index);
            } else {
                $skill = new \Entities\Skill();
            }
            $ss->addSkill($skill, $skillData->index);
        }
        return $ss;
    }
    
    
}
