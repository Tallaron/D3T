<?php

namespace Mappers;

class BuildDBMapper extends \Mappers\AbstractDBMapper {



    /**
     * Creates a new record with build meta data. Returns the id of the newly
     * created build.
     * @param id $classId Id of the hero class the build is created for.
     * @param String $name The name of the build.
     * @param String $version Game version the build was made for.
     * @return int
     */
    public static function createBuild($classId, $name, $version, $published) {
        $sql = 'INSERT INTO builds (`name`, `class_id`, `version`, `created`, `updated`, `published`) VALUES (:name, :classId, :version, NOW(), NOW(), :published)';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':classId' => $classId,
            ':version' => $version,
            ':published' => $version,
            ]);
        return self::findBuildIdByName($name);
    }
    
    /**
     * Returns the buildId of the build with the given <b>$name</b>.
     * @param String $name
     * @return int
     */
    public static function findBuildIdByName($name) {
        $sql = 'SELECT id FROM builds WHERE name LIKE :name;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':name' => $name]);
        return $stmt->fetchColumn();
    }


    /**
     * Puts the cube data of the build submitted via $_POST into the db.
     * @param StdObject $obj
     */
    public static function saveCube($obj) {
        $cubeData = $obj->cube;
        $fields = ['build_id','item_id','type'];
        $params = [];
        foreach($cubeData as $key => $val) {
            $params = array_merge($params, array($obj->id,$val,$key));
        }
        $sql = self::getPreparedInsertUpdateSQL('build_cube', $fields, count((array)$cubeData));
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute($params);
    }

    /**
     * Updates the build meta based on the data provided by <b>$obj</b>.
     * @param StdObject $obj
     */
    public static function updateMeta($obj) {
        $map = [
            'class_id' => $obj->class,
            'name' => $obj->name,
            'version' => $obj->version,
            'updated' => (new \DateTime())->format('y-m-d H:i:s'),
            'published' => $obj->published,
            ];
        $sql = self::getPreparedUpdateSQL('builds', $map);
                
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( array_merge(array_values($map), [$obj->id]) );
    }

    /**
     * Iterates through the items of the build given by the <b>$obj</b>-data and
     * tries to save/update them.
     * @param StdObject $obj
     */
    public static function saveItems($obj) {
        foreach($obj->items as $key => $item) {
            $builItemId = self::saveItem($obj->id, $item->item, $key);
            if(property_exists($item, 'socket')) {
                self::saveGems($builItemId, $item->socket);
            }
        }
    }
    
    /**
     * Stores an item into the db. Aoociates this with the given build and
     * returns the itemId.
     * @param int $buildId
     * @param int $itemId
     * @param String $slotKey
     * @return int
     */
    public static function saveItem($buildId, $itemId, $slotKey) {
        $fields = ['build_id','item_id','slot_key'];
        $sql = self::getPreparedInsertUpdateSQL('build_items', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $buildId,
            $itemId,
            $slotKey,
        ]);
        return self::findBuildItemIdBySlot($buildId, $slotKey);
    }

    /**
     * Returns the itemId of the item identified by the <b>$slotKey</b> and
     * <b>$buildId</b>.
     * @param int $buildId
     * @param String $slotKey
     * @return int
     */
    public static function findBuildItemIdBySlot($buildId, $slotKey) {
        $sql = 'SELECT id FROM build_items WHERE build_id = '.$buildId.' AND slot_key = "'.$slotKey.'";';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchColumn();
    }

    /**
     * Stores the gems data of the gems of an items to the specified position
     * in the db. The position is specified by the <b>$buildItemId</b> and the <b>$index</b>
     * of each <b>$gem</b>.
     * @param int $buildItemId
     * @param array $gems
     */
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
        $sql = self::getPreparedInsertUpdateSQL('build_gems', $fields, count((array)$gems));
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute($params);
    }
    
    /**
     * Iterates through the active skills of the build given by the <b>$obj</b>-data and
     * tries to save/update them.
     * @param StdObject $obj
     */
    
    public static function saveActiveSkills($obj) {
        foreach($obj->{'skill-a'} as $key => $skill) {
            self::saveActiveSkill($obj->id, $key, $skill->skill, $skill->rune);
        }
    }
    
    /**
     * Insert or updates a record for an active skill into the db.
     * @param int $buildId
     * @param int $index
     * @param int $skillId
     * @param int $runeId
     */
    public static function saveActiveSkill($buildId, $index, $skillId, $runeId) {
        $fields = ['build_id','index','skill_id','rune_id'];
        $sql = self::getPreparedInsertUpdateSQL('build_skills_a', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $buildId,
            $index,
            $skillId,
            $runeId,
        ]);
    }

    /**
     * Iterates throug the passive skills of the given build and tries to save
     * them into the db.
     * @param StdObject $obj
     */
    public static function savePassiveSkills($obj) {
        foreach($obj->{'skill-p'} as $key => $skill) {
            self::savePassiveSkill($obj->id, $key, $skill->skill);
        }
    }
    
    /**
     * Insert ot updates a record for an passive skill intot he db.
     * @param int $buildId
     * @param int $index
     * @param int $skillId
     */
    public static function savePassiveSkill($buildId, $index, $skillId) {
        $fields = ['build_id','index','skill_id'];
        $sql = self::getPreparedInsertUpdateSQL('build_skills_p', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $buildId,
            $index,
            $skillId,
        ]);
    }

    
    
    
    
    
    
    
    
    
    
    
    public static function saveScope($obj) {
        $fields = ['build_id','scope_group','scope_key', 'val'];
        $params = [];
        foreach(['solo', 'team'] as $group) {
            foreach($obj->scope->$group as $key => $val) {
                $params = array_merge($params, [
                    $obj->id,
                    $group,
                    $key,
                    $val,
                ]);
            }
        }
        $sql = self::getPreparedInsertUpdateSQL('build_scope', $fields, count($params)/count($fields));
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute($params);
    }

    public static function findScopeByBuildIdAndGroup($buildId, $group) {
        $sql = 'SELECT s.scope_key as `key`, s.val FROM build_scope s WHERE s.build_id = ? AND s.scope_group = ?;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $buildId,
            $group
        ]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    























    /**
     * Returns a \Entities\Build object containing the meta data of that build.
     * @param int $id
     * @return \Entities\Build
     */
    public static function  findBuildMetaById($id) {
        $sql = 'SELECT id, name, class_id AS classId, version, published FROM builds WHERE id = :id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchObject('\Entities\Build');
    }
    
    /**
     * Returns an array of \Entities\Build objects randomly picked from database.
     * Restrictions are the game<b>$version</b> and the <b>$limit</b> of results.
     * @param String $version
     * @param int $limit
     * @return array
     */
    public static function  findBuildMetaRandomised($version, $limit) {
        $sql = 'SELECT b.id, b.name, b.class_id AS classId, b.version FROM builds b WHERE b.version LIKE :version AND b.published=1 ORDER BY RAND() LIMIT :limit;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->bindParam(':version', $version, \PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT); //bind methods are required for "prepared LIMIT"!
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Build');
    }

    /**
     * Returns the Cube items information gathers fromt he db according to the
     * given <b>$id</b>. Return type is <i>array of StdObject</i>.
     * @param int $id
     * @return array
     */
    public static function findCubeByBuildId($id) {
        $sql = 'SELECT i.*, bc.`type` AS `type` FROM build_cube bc 
                    JOIN raw_data_items i ON(bc.item_id=i.id)
                        WHERE bc.build_id=:id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Item');
    }

    /**
     * Returns an array of \Entities\Item, representing the inventory of the
     * build identified by <b>$id</b>.
     * @param int $id
     * @return array
     */
    public static function findInventoryByBuildId($id) {
        $sql = 'SELECT 
                    bi.build_id AS buildId, 
                    i.id, 
                    i.slug, 
                    i.name, 
                    i.icon, 
                    i.quality, 
                    i.link, 
                    bi.slot_key AS `type`, 
                    IF(i.quality="set", "green", "orange") AS displayColor, 
                    s.sockets 
                        FROM build_items bi
                        JOIN raw_data_items i ON(bi.item_id=i.id)
                        JOIN slots s ON(bi.slot_key=s.`key`)
                            WHERE bi.build_id=:id;';
//                    concat("item/",i.slug) AS tooltipParams //there was an issue with recipe based items

        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Item');
    }

    /**
     * Returns an array of \Entities\Gem, representing the gems used in the
     * item identified by <b>$itemId</b>.
     * @param int $itemId
     * @return array
     */
    public static function findGemsByItemId($buildId, $itemId) {
        $sql = 'SELECT
	bg.gem_id AS id,
	g.slug,
	g.name,
	g.icon,
	g.`type`,
	g.`level`,
	bg.socket_index AS `index`
		FROM raw_data_gems g
			RIGHT JOIN build_gems bg ON bg.gem_id=g.id
			RIGHT JOIN build_items bi ON bi.id=bg.build_item_id
				WHERE bi.build_id=:build
				AND bi.item_id=:id;';
//        $sql = 'SELECT g.*, bg.socket_index AS `index` FROM build_items bi 
//                    JOIN build_gems bg ON(bi.id=bg.build_item_id)
//                    JOIN raw_data_gems g ON(bg.gem_id=g.id)
//                        WHERE bi.build_id = :build
//                        AND bi.item_id=:id;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( ['build' => $buildId, ':id' => $itemId,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Gem');
    }

    /**
     * Returns an array of StdObject. The objects are associated to
     * the build given by <b>$id</b> and they contain not only the skill id's
     * but also the runeId which is set to the build-skill-combination.
     * @param int $id
     * @return array
     */
    public static function findActiveSkillsByBuildId($id) {
        $sql = 'SELECT skill_id AS skillId, rune_id AS runeId, `index` AS "index" FROM build_skills_a WHERE build_id = :id';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    /**
     * Returns an array of StdObject. The objects are associated to
     * the build given by <b>$id</b>.
     * @param int $id
     * @return array
     */
    public static function findPassiveSkillsByBuildId($id) {
        $sql = 'SELECT skill_id AS skillId, `index` AS "index" FROM build_skills_p WHERE build_id = :id';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    /**
     * Returns a list (array) of StdObjects with some meta data about the
     * build associated to the specified hero class given by the (class-)<b>$key</b>
     * @param String $kex
     * @return array
     */
    public static function findBuildMetaByClassKey($key) {
        $sql = 'SELECT b.id, b.name, b.version, c.key FROM builds b JOIN classes c ON(b.class_id=c.id) WHERE c.key LIKE :key AND b.published=1 ORDER BY name ASC;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':key' => $key,] );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Entities\Build');
    }
    
    
    
    
    

    public static function findPassiveSkillById($id) {
        $sql = 'SELECT * FROM raw_data_skills_p WHERE id=:id';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchObject('\Entities\Skill');
    }
    
    public static function findAktiveSkillById($id) {
        $sql = 'SELECT * FROM raw_data_skills_a WHERE id=:id';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchObject('\Entities\Skill');
    }
    
    
    
    
    
    
    /**
     * Returns the \Entities\Rune object of the rune indentified by <b>$id</b>.
     * @param int $id
     * @return \Entities\Rune
     */
    public static function findRuneById($id) {
        $sql = 'SELECT * FROM raw_data_runes WHERE id=:id';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute( [':id' => $id,] );
        return $stmt->fetchObject('\Entities\Rune');
    }
    
    
    
    
    
    
    
    
    
    
}
