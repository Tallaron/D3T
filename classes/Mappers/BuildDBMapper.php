<?php

namespace Mappers;

class BuildDBMapper extends \Mappers\AbstractDBMapper {
    
    public static function saveCube($obj) {
        $cubeData = $obj->cube;
        $fields = ['build_id','item_id','type'];
        $params = [];
        foreach($cubeData as $key => $val) {
            $params = array_merge($params, array($obj->id,$val,$key));
        }
        $sql = self::getPreparedInsertSQL('build_cube', $fields, count((array)$cubeData));
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute($params);
        
    }
    
    
    public static function saveMeta($obj) {
        $fields = ['class_id','name','version'];
        $sql = self::getPreparedInsertSQL('builds', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $obj->class,
            $obj->name,
            $obj->version,
        ]);
    }
    
    
    public static function saveItems($obj) {
        foreach($obj->items as $key => $item) {
            $builItemId = self::saveItem($obj->id, $item->item, $key);
            if(property_exists($item, 'socket')) {
                self::saveGems($builItemId, $item->socket);
            }
        }
    }
    
    
    
    public static function saveItem($buildId, $itemId, $slotKey) {
        $fields = ['build_id','item_id','slot_key'];
        $sql = self::getPreparedInsertSQL('build_items', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $buildId,
            $itemId,
            $slotKey,
        ]);
        return self::findBuildItemId($buildId, $slotKey);
    }
    
    public static function findBuildItemId($buildId, $slotKey) {
        $sql = 'SELECT id FROM build_items WHERE build_id = '.$buildId.' AND slot_key = "'.$slotKey.'";';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchColumn();
    }

    
    
    public static function saveGems($buildItemId, $gems) {
        $fields = ['build_item_id','gem_id','socket_index'];
        $params = [];
        foreach($gems as $index => $gem) {
            $params = array_merge($params, [
                $buildItemId,
                $gem,
                $index,
            ]);
        }
        $sql = self::getPreparedInsertSQL('build_gems', $fields, count((array)$gems));
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute($params);
    }
    
    
    
    
    
    public static function saveActiveSkills($obj) {
        foreach($obj->{'skill-a'} as $key => $skill) {
            self::saveActiveSkill($obj->id, $key, $skill->skill, $skill->rune);
        }
    }

    
    
    public static function saveActiveSkill($buildId, $index, $skillId, $runeId) {
        $fields = ['build_id','index','skill_id','rune_id'];
        $sql = self::getPreparedInsertSQL('build_skills_a', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $buildId,
            $index,
            $skillId,
            $runeId,
        ]);
    }

    
    public static function savePassiveSkills($obj) {
        foreach($obj->{'skill-p'} as $key => $skill) {
            self::savePassiveSkill($obj->id, $key, $skill->skill);
        }
    }

    
    
    public static function savePassiveSkill($buildId, $index, $skillId) {
        $fields = ['build_id','index','skill_id'];
        $sql = self::getPreparedInsertSQL('build_skills_p', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $buildId,
            $index,
            $skillId,
        ]);
    }

    






































    public static function  findBuildById($id) {
        $sql = 'SELECT id, name, class_id as "classId", version FROM builds WHERE id = :id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchObject('\Entities\Build');
    }

    public static function findCubeById($id) {
        $sql = 'SELECT item_id AS itemId, `type` FROM build_cube WHERE build_id=:id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function findInventoryById($id) {
        $sql = 'SELECT item_id AS id, slot_key AS slotKey FROM build_items WHERE build_id=:id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Item');
    }
    
    public static function findGemsByItemId($itemId) {
        $sql = 'SELECT bg.gem_id AS id, bg.socket_index AS slotIndex '
                . 'FROM build_items bi JOIN build_gems bg ON(bg.build_item_id = bi.id) '
                . 'WHERE bi.item_id = :id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $itemId,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Gem');
    }

    
    public static function findRawRunesBySkillId($id) {
        $sql = 'SELECT * FROM raw_data_runes WHERE skill_id=:id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Rune');
    }
    
    public static function findActiveSkillsById($id) {
        $sql = 'SELECT skill_id AS skillId, rune_id AS runeId, `index` AS "index" FROM build_skills_a WHERE build_id = :id';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\EditorSkill');
    }
    
    public static function findPassiveSkillsById($id) {
        $sql = 'SELECT skill_id AS skillId, `index` AS "index" FROM build_skills_p WHERE build_id = :id';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\EditorSkill');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public static function findBuildMetaByKey($key) {
        $sql = 'SELECT b.id, b.name, b.version, c.key FROM builds b JOIN classes c ON(b.class_id=c.id) WHERE c.key LIKE :key;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':key' => $key,] );
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
