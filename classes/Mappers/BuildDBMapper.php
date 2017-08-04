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
        $fields = ['buil_item_id','gem_id','socket_index'];
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

    
    public static function findRunesBySkillId($id) {
        $sql = 'SELECT * FROM build_runes WHERE skill_id=:id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    
    
    
    
}
