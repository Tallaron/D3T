<?php

namespace Mappers;

class DBMapper extends \Mappers\AbstractDBMapper {

    /**
     * Given by the <b>$slotKey</b> this method returns an array of \Entities\Item.
     * @param String $slotKey
     * @return array
     */
    public static function findAllItemsBySlotKey($slotKey) {
        $params = [$slotKey];
        if($slotKey === 'offHand') {
            $params[] = 'mainHand';
        }
        
        $sql = 'SELECT i.* '
                .'FROM raw_data_items i '
                .'JOIN item_types t ON i.`type`=t.id '
                .'JOIN slots s ON t.slot=s.id '
                .'WHERE s.`key` IN'
                .self::getPlaceholder($params, 1)
                .' ORDER BY i.slug ASC;';
        
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Item');
    }

    /**
     * Returns an array of \Entities\HeroClass.
     * @return array
     */
    public static function findAllHeroClasses() {
        $sql = 'SELECT * FROM classes;';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\HeroClass');
    }
    
    /**
     * Returns an object of \Entities\HeroClass according to the given <b>$key</b>.
     * @param String $key
     * @return \Entities\HeroClass
     */
    public static function findHeroClassByKey($key) {
        $sql = 'SELECT * FROM classes WHERE `key` LIKE :key;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':key' => $key]);
        return $stmt->fetch(\PDO::FETCH_CLASS, 'Entities\HeroClass');
    }

    /**
     * Returns an array of \Entities\ItemType.
     * @return array
     */
    public static function findAllItemTypes() {
        $sql = 'SELECT t.`*`, s.`key` AS slotKey, s.sockets, c.`key` as classKey '
                .'FROM item_types t '
                .'JOIN slots s ON(t.slot=s.id) '
                .'JOIN classes c ON(t.class=c.id);';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\ItemType');
    }


    /**
     * 
     * @param String $key
     * @return \Entities\ItemType
     */
    public static function findItemTypeByKey($key) {
        $sql = 'SELECT t.`*`, s.`key` AS slotKey, s.sockets, c.`key` as classKey '
                .'FROM item_types t '
                .'JOIN slots s ON(t.slot=s.id) '
                .'JOIN classes c ON(t.class=c.id)'
                .'WHERE t.`key` LIKE :key;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':key' => $key]);
        return $stmt->fetch(\PDO::FETCH_CLASS, '\Entities\ItemType');
    }
    
    /**
     * Returns the skillId from the skill identified by <b>$slug</b>.
     * @param String $slug
     * @return int
     */
    public static function findSkillIdBySlug($slug) {
        $sql = 'SELECT id FROM raw_data_skills_a WHERE slug LIKE :slug;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':slug' => $slug]);
        return $stmt->fetchColumn();
    }

    /**
     * Returns an array of \Entities\ActiveSkill for the specified hero class
     * by the given <b>$classId</b>.
     * @param int $id
     * @return array
     */
    public static function findAllActiveSkillsByClassId($classId) {
        $sql = 'SELECT * FROM raw_data_skills_a WHERE class_id = :id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':id' => $classId]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\ActiveSkill');
    }
    
    /**
     * Returns an array of \Entities\Rune. The runes are associated to the skill
     * given by the <b>$id</b>.
     * @param int $id
     * @return array
     */
    public static function findRawRunesBySkillId($id) {
        $sql = 'SELECT * FROM raw_data_runes WHERE skill_id=:id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Rune');
    }

    /**
     * Returns an array of \Entities\PassiveSkill for the specified hero class
     * by the given <b>$classId</b>.
     * @param int $classId
     * @return array
     */
    public static function findAllPassiveSkillsByClassId($classId) {
        $sql = 'SELECT * FROM raw_data_skills_p WHERE class_id = :id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':id' => $classId]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\PassiveSkill');
    }
    

    /**
     * Returns an array of \Entities\Gem. There are two including filters:
     * <b>$types</b>, e.g. 'default' or 'legendary' and
     * <b>$levels</b>, e.g. 1,3,10.
     * If there is nothing defined to be included, the result will be empty!
     * @param array $types
     * @param array $levels
     * @return array
     */
    public static function findAllGems(array $types = [], array $levels = []) {
        $sql = 'SELECT * FROM raw_data_gems '
                . 'WHERE `type` IN'.self::getPlaceholder($types, 1).' '
                . 'AND `level` IN'.self::getPlaceholder($levels, 1).';';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( array_merge($types, $levels) );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Gem');
    }

    /**
     * Returns an array of \Entities\Item. There are two including filters:
     * <b>$classes</b>, that awaits classIds, e.g. 1,2,3 and
     * <b>$slots</b>, e.g. 'helm', 'leftFinger' or 'mainHand'
     * If there is nothing defined to be included, the result will be empty!
     * @param array $types
     * @param array $levels
     * @return array
     */
    public static function findAllItems(array $classes = [], array $slots = []) {
        $sql = 'SELECT i.*
                    FROM raw_data_items i 
                    JOIN item_types t ON(i.`type`=t.id) 
                    JOIN classes c ON(t.class=c.id)
                    JOIN slots s ON(t.slot=s.id)
                        WHERE c.`id` IN'.self::getPlaceholder($classes, 1).'
                        AND s.`key` IN'.self::getPlaceholder($slots, 1).'
                            ORDER BY i.name ASC;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( array_merge($classes, $slots) );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Item');
    }
    
}
