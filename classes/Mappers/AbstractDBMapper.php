<?php

namespace Mappers;

abstract class AbstractDBMapper {
    private static $pdo;
    
    
    
    
    public static function setPDO($pdo) {
        self::$pdo = $pdo;
    }
    
    public static function getPDO() {
        return self::$pdo;
    }
    
    
    
    public static function getPreparedInsertSQL($tblName, array $fields, $numRecords) {
        return 'INSERT INTO '
        .$tblName
        .self::getFieldListSQL($fields)
        .' VALUES '
        .self::getPlaceholder($fields, $numRecords)
        .' ON DUPLICATE KEY UPDATE '
        .'`id`=`id`, '
        .self::getFieldUpdateListSQL($fields)
        .';';
    }

    



    public static function getFieldListSQL(array $fields) {
        $start = '(`';
        $end = '`)';
        return $start . implode('`,`', $fields) . $end;
    }
    
    public static function getFieldUpdateListSQL(array $fields) {
        $sqlPart = '';
        foreach($fields as $field) {
            $sqlPart .= '`'.$field.'`=VALUES(`'.$field.'`),';
        }
        return substr($sqlPart, 0, strlen($sqlPart)-1);
    }
    
    public static function getPlaceholder(array $fields, $numRecords) {
        $sqlPart = '';
        $start = '(';
        $end = ')';
        $record = $start . implode(',', array_fill(0, count($fields), '?')) . $end;
        return implode(',', array_fill(0, $numRecords, $record));
    }
    
    
}
