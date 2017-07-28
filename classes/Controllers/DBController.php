<?php

namespace Controllers;

class DBController extends AbstractDBController {

    
    
    
    
    public function findAllBySlotKey($slotKey) {
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
    
    
    
    
    
    public function findAllHeroClasses() {
        $sql = 'SELECT * FROM classes;';
        $stmt = self::getPDO()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function findHeroClassByKey($key) {
        $sql = 'SELECT * FROM classes WHERE `key` LIKE :key;';
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([':key' => $key]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    
    
}
