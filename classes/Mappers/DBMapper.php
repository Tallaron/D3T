<?php

namespace Mappers;

class DBMapper extends \Mappers\AbstractDBMapper {

    
    
    
    
    public static function findAllBySlotKey($slotKey) {
        $params = [':key' => $slotKey];
        if($slotKey === 'offHand') {
            $params[':key2'] = 'mainHand';
            $sql = 'SELECT r.id, r.slug, r.`set` FROM raw_data_items r JOIN slots s ON r.slot=s.id WHERE s.`key` LIKE :key OR s.`key` LIKE :key2 ORDER BY r.slug ASC;';
        } else {
            $sql = 'SELECT r.id, r.slug, r.`set` FROM raw_data_items r JOIN slots s ON r.slot=s.id WHERE s.`key` LIKE :key ORDER BY r.slug ASC;';
        }
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\SlugItem');
    }
    
    
    
    
    
    public static function findAllHeroClasses() {
        $sql = 'SELECT * FROM classes;';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public static function findHeroClassByKey($key) {
        $sql = 'SELECT * FROM classes WHERE `key` LIKE :key;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':key' => $key]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    
    public static function findAllItemTypes() {
        $sql = 'SELECT * FROM item_types;';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public static function findItemTypeByKey($key) {
        $sql = 'SELECT * FROM item_types WHERE `key` LIKE :key;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':key' => $key]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    
    
    
    
    public static function saveItem(\Entities\ImportItem $item) {
        $sql = 'INSERT INTO raw_data_items (`slug`, `name`, `icon`, `level`, `type`, `quality`) '
                . 'VALUES ("'.$item->getSlug().'", "'.$item->getName().'", "'.$item->getIcon().'", '.$item->getLevel().', '.$item->getType().', "'.$item->getQuality().'") '
                . 'ON DUPLICATE KEY UPDATE '
                . 'id=id, '
                . '`slug`="'.$item->getSlug().'", '
                . '`name`="'.$item->getName().'", '
                . '`icon`="'.$item->getIcon().'", '
                . '`level`='.$item->getLevel().', '
                . '`type`='.$item->getType().', '
                . '`quality`="'.$item->getQuality().'";';
        self::getPDO()->query($sql);
    }
    
    
    
    
    
    public static function savePassiveSkill(\Entities\ImportPassiveSkill $skill) {
        $sql = 'INSERT INTO raw_data_skills_p (`class_id`, `slug`, `name`, `icon`) '
                . 'VALUES ('.$skill->getHeroClass().', "'.$skill->getSlug().'", "'.$skill->getName().'", "'.$skill->getIcon().'") '
                . 'ON DUPLICATE KEY UPDATE '
                . 'id=id, '
                . '`class_id`='.$skill->getHeroClass().', '
                . '`slug`="'.$skill->getSlug().'", '
                . '`name`="'.$skill->getName().'", '
                . '`icon`="'.$skill->getIcon().'";';
        self::getPDO()->query($sql);
    }
    
    
    
    
    public static function saveActiveSkill(\Entities\ImportActiveSkill $skill) {
        $sql = 'INSERT INTO raw_data_skills_a (`class_id`, `slug`, `name`, `icon`) '
                . 'VALUES ('.$skill->getHeroClass().', "'.$skill->getSlug().'", "'.$skill->getName().'", "'.$skill->getIcon().'") '
                . 'ON DUPLICATE KEY UPDATE '
                . 'id=id, '
                . '`class_id`='.$skill->getHeroClass().', '
                . '`slug`="'.$skill->getSlug().'", '
                . '`name`="'.$skill->getName().'", '
                . '`icon`="'.$skill->getIcon().'";';
        self::getPDO()->query($sql);
        $skill->setId( self::findSkillIdBySlug($skill->getSlug()) );
        self::saveRunes($skill);
    }
    
    public static function findSkillIdBySlug($slug) {
        $sql = 'SELECT id FROM raw_data_skills_a WHERE slug LIKE "'.$slug.'"';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchColumn();
    }
    
    
    
    
    public static function saveRunes(\Entities\ImportActiveSkill $skill) {
        foreach($skill->getRunes() as $rune) {
            self::saveRune($rune);
        }
    }



    public static function saveRune(\Entities\ImportRune $rune) {
        $sql = 'INSERT INTO raw_data_runes (`skill_id`, `slug`, `name`, `type`) '
                . 'VALUES ('.$rune->getSkillId().', "'.$rune->getSlug().'", "'.$rune->getName().'", "'.$rune->getType().'") '
                . 'ON DUPLICATE KEY UPDATE '
                . 'id=id, '
                . '`skill_id`='.$rune->getSkillId().', '
                . '`slug`="'.$rune->getSlug().'", '
                . '`name`="'.$rune->getName().'", '
                . '`type`="'.$rune->getType().'";';
        self::getPDO()->query($sql);
    }
    
    public static function saveGem(\Entities\ImportGem $gem) {
        $sql = 'INSERT INTO raw_data_gems (`slug`, `name`, `icon`, `type`, `level`) '
                . 'VALUES ("'.$gem->getSlug().'", "'.$gem->getName().'", "'.$gem->getIcon().'", "'.$gem->getType().'", '.$gem->getLevel().') '
                . 'ON DUPLICATE KEY UPDATE '
                . 'id=id, '
                . '`slug`="'.$gem->getSlug().'", '
                . '`name`="'.$gem->getName().'", '
                . '`icon`="'.$gem->getIcon().'", '
                . '`type`="'.$gem->getType().'", '
                . '`level`="'.$gem->getLevel().'";';
        self::getPDO()->query($sql);
    }
    
    
    
    
    
    
    
    public static function createBuild($classId, $name, $version) {
        $sql = 'INSERT INTO builds (`name`, `class_id`, `version`) VALUES (:name, :classId, :version)';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':classId' => $classId,
            ':version' => $version,
            ]);
        return self::findBuildIdByName($name);
    }
    
    public static function findBuildIdByName($name) {
        $sql = 'SELECT id FROM builds WHERE name LIKE "'.$name.'";';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchColumn();
    }
    
    
    
    
    
    
    public static function findAllActiveSkillsByClassId($id) {
        $sql = 'SELECT * FROM raw_data_skills_a WHERE class_id = :id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\ActiveSkill');
    }
    
    public static function findAllPassiveSkillsByClassId($id) {
        $sql = 'SELECT * FROM raw_data_skills_p WHERE class_id = :id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\PassiveSkill');
    }
    


    public static function findAllGems(array $types = [], array $levels = []) {
        $sql = 'SELECT * FROM raw_data_gems '
                . 'WHERE `type` IN('.implode(',', array_fill(0, count($types), '?')).') '
                . 'AND `level` IN('.implode(',', array_fill(0, count($levels), '?')).');';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute(array_merge($types, $levels) );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Gem');
    }

    
    public static function findAllItems(array $classes = [], array $slots = []) {
        $sql = 'SELECT i.*
                    FROM raw_data_items i 
                    JOIN item_types t ON(i.`type`=t.id) 
                    JOIN classes c ON(t.class=c.id)
                    JOIN slots s ON(t.slot=s.id)
                        WHERE c.`id` IN('.implode(',', array_fill(0, count($classes), '?')).')
                        AND s.`key` IN('.implode(',', array_fill(0, count($slots), '?')).')
                            ORDER BY i.name ASC;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute(array_merge($classes, $slots) );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Item');
    }
    
    
    
    
    
    
    
    
}
