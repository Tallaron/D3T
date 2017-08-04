<?php

namespace Mappers;

class BuildListCollectionMapper {

    public static function createObject(\Entities\Build $build) {
        return (new \Entities\BuildListCollection())
            ->setActiveSkills( self::loadActiveSkills( $build->getClassId() ) )
            ->setPassiveSkills( self::loadPassiveSkills( $build->getClassId() ) )
            ->setGems( self::loadGems() )
            ->setItems( self::loadItems( $build->getClassId() ) )
            ->setCube( self::loadCube( $build->getClassId() ) );
    }

    private static function loadActiveSkills($classId) {
        return \Mappers\DBMapper::findAllActiveSkillsByClassId( $classId );
    }

    private static function loadPassiveSkills($classId) {
        return \Mappers\DBMapper::findAllPassiveSkillsByClassId( $classId );
    }

    private static function loadGems() {
        return array_merge(
            \Mappers\DBMapper::findAllGems(['default'], [10]),  //normal gems, i.e. emerald
            \Mappers\DBMapper::findAllGems(['legendary'], [1]) //legendary gems, i.e. taeguk
        );
    }

    /**
     * Returns an array of array with StdObject received from the db, containing
     * filtered "collections" of items.
     * ClassID 8 represents 'all' classes and is set by default.
     * @param int $classId
     * @return mixed
     */
    private static function loadItems($classId = 8) {
        /*
         * Key <i>offHand</i> is handled separately, because of dual wielding
         * classes. Also rightFinger isn't used in this scope, because it's the
         * same as leftFinger while just representing rings.
         */
        $slots = ['head','torso','waist','legs','feet','shoulders','hands','leftFinger','mainHand','bracers','neck'];
        $collection = [];
        if(in_array($classId, [1,3,4])) { //if dual wielding class; barb, monk, dh
            $collection['offHand'] = \Mappers\DBMapper::findAllItems([8, $classId], ['offHand', 'mainHand']);
        } else {
            $collection['offHand'] = \Mappers\DBMapper::findAllItems([8, $classId], ['offHand']);
        }

        foreach($slots as $slot) {
            $collection[$slot] = \Mappers\DBMapper::findAllItems([8, $classId], [$slot]);
        }
        $collection['rightFinger'] = $collection['leftFinger']; // there are no items in db for rightFinger, but it's the same as leftFinger
        return $collection;
    }

    /**
     * Returns an array with item lists for using in the cube, filtered by the
     * <b>$classId</b>. Param <b>$classId</b> defaults to 8, representing
     * <i>all</i> classes.
     * @param int $classId
     * @return mixed
     */
    private static function loadCube($classId = 8) {
        return [
            'weapon' => \Mappers\DBMapper::findAllItems([8, $classId], ['mainHand', 'offHand']),
            'armor' => \Mappers\DBMapper::findAllItems([8, $classId], ['head', 'torso', 'waist', 'legs', 'feet', 'shoulders', 'hands', 'bracers']),
            'jewelry' => \Mappers\DBMapper::findAllItems([8, $classId], ['leftFinger', 'neck']),
        ];
    }

    
    
    
}
