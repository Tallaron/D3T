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
    
    
    
    
    
}
