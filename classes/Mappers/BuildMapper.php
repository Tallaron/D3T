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
            ->setItems(\Mappers\EditorInventoryMapper::createObject(
                                    \Mappers\BuildDBMapper::findInventoryByBuildId($buildId)))
            ->setCube(\Mappers\EditorCubeMapper::createObject(
                                    \Mappers\BuildDBMapper::findCubeByBuildId($buildId)))
            ->setPassiveSkills(\Mappers\EditorSkillSetMapper::createObject(
                                    \Mappers\BuildDBMapper::findPassiveSkillsByBuildId($buildId)))
            ->setActiveSkills(\Mappers\EditorSkillSetMapper::createObject(
                                    \Mappers\BuildDBMapper::findActiveSkillsByBuildId($buildId)));
        $build->setRuneLists( self::loadRuneLists($build) );
        return $build;
    }
    
    
    
    
    public static function loadRuneLists($build) {
        $runeLists = [];
        foreach($build->getActiveSkills()->getSkills() as $activeSkill) {
            $runeLists[$activeSkill->getIndex()] = \Mappers\DBMapper::findRawRunesBySkillId( $activeSkill->getSkillId() );
        }
        return $runeLists;
    }
    
    
    
    
}
