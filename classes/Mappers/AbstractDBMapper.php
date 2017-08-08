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
    
    /**
     * Returns the whole prepared statement, according to the <b>$tblName</b>,
     * <b>$fields</b>-list and <b>$numRecords</b> which might be stored.
     * @param String $tblName
     * @param array $fields
     * @param int $numRecords
     * @return String
     */
    public static function getPreparedInsertUpdateSQL($tblName, array $fields, $numRecords) {
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
    
    /**
     * Returns the whole prepared SQL statement for inserting new records
     * in <b>$tblName</b>. The structure of the placeholders are set, according
     * to <b>$fields</b> and <b>$numRecords</b>.
     * @param String $tblName
     * @param array $fields
     * @param int $numRecords
     * @return String
     */
    public static function getPreparedCreateSQL($tblName, array $fields, $numRecords) {
        return 'INSERT INTO '
        .$tblName
        .self::getFieldListSQL($fields)
        .' VALUES '
        .self::getPlaceholder($fields, $numRecords)
        .';';
    }

    /**
     * Returns an update statement for the given <b>$tblName</b>. The statement
     * is filled with placeholders according to the (associative)</b>$updateMap</b>.
     * The statement also contains a placeholder for an id that must delivered
     * as last param to the execution.
     * @param String $tblName
     * @param array $updateMap
     * @return String
     */
    public static function getPreparedUpdateSQL($tblName, array $updateMap) {
        return 'UPDATE '
                .$tblName
                .' SET '
                .self::getUpdateSetSQL($updateMap)
                .' WHERE `id`=?;';
    }

    /**
     * Returns the <i>set</i> structure of an update statement, e.g:
     * '`fieldName1`=?,...,`fieldNameN`=?'.
     * @param type $updateMap
     * @return String
     */
    public static function getUpdateSetSQL($updateMap) {
        $updateSet = [];
        foreach($updateMap as $field => $value) {
            $updateSet[] = '`'.$field.'`=?';
        }
        return implode(',', $updateSet);
    }

    /**
     * Creates the field list for statement header like:
     * '(`fieldName1`,...,`fieldNameN`)'
     * @param array $fields
     * @return String
     */
    public static function getFieldListSQL(array $fields) {
        $start = '(`';
        $end = '`)';
        return $start . implode('`,`', $fields) . $end;
    }
    
    /**
     * Created a SQL partial for an insert-update-statement like:
     * '`fieldName1`=VALUES(`fieldName1`),...,`fieldNameN`=VALUES(`fieldNameN`)'
     * @param array $fields
     * @return String
     */
    public static function getFieldUpdateListSQL(array $fields) {
        $sqlPart = '';
        foreach($fields as $field) {
            $sqlPart .= '`'.$field.'`=VALUES(`'.$field.'`),';
        }
        return substr($sqlPart, 0, strlen($sqlPart)-1);
    }

    /**
     * Creates the placeholders for a prepared statement, according to the
     * number of fields and number of records which might stored in the db:
     * '(?,..,?),...,(?,...,?)'
     * The params are prepared and bypassed to the PDO::Statement within
     * another method.
     * @param array $fields
     * @param int $numRecords
     * @return String
     */
    public static function getPlaceholder(array $fields, $numRecords) {
        $start = '(';
        $end = ')';
        $record = $start . implode(',', array_fill(0, count($fields), '?')) . $end;
        return implode(',', array_fill(0, $numRecords, $record));
    }
    
    
}
