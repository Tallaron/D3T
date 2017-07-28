<?php

namespace Controllers;

abstract class AbstractDBController {
    private static $pdo;
    
    
    
    
    public static function setPDO($pdo) {
        self::$pdo = $pdo;
    }
    
    public static function getPDO() {
        return self::$pdo;
    }
    
    
    
    
}
