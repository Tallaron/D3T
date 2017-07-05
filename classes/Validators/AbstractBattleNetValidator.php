<?php

namespace Validators;

abstract class AbstractBattleNetValidator extends \Controllers\AbstractController {

    /**
     * Returns true if the given $realm is valid and available
     * @param String $realm
     * @return boolean
     */
    public static function validateRealm($realm) {
        return array_key_exists($realm, self::getSettings()->get('BNET_REALM_NAME'));
    }
    
    /**
     * Returns true if the flag holds a valid value
     * @param int $seasonFlag
     * @return boolean
     */
    public static function validateSeasonFlag($seasonFlag) {
        return in_array($seasonFlag, [0,1]);
    }

    /**
     * Returns true if the flag holds a valid value
     * @param int $hardcoreFlag
     * @return boolean
     */
    public static function validateHardcoreFlag($hardcoreFlag) {
        return in_array($hardcoreFlag, [0,1]);
    }
    
    /**
     * Returns true if the index is within or equals to the min/max values
     * determined by the given realm and seasonal mode.
     * The $season parameter will be used as boolval($season)!
     * @param String $realm
     * @param boolVal $season
     * @param int $index
     * @return boolean
     */
    public static function validateIndex($realm, $season, $index) {
        $min = boolval($season) ? self::getSettings()->get('RANKING_MIN_SEASON_INDEX', $realm) : self::getSettings()->get('RANKING_MIN_ERA_INDEX', $realm);
        $max = boolval($season) ? self::getSettings()->get('RANKING_MAX_SEASON_INDEX', $realm) : self::getSettings()->get('RANKING_MAX_ERA_INDEX', $realm);
        if($index <= $max && $index >= $min) {
            return true;
        } return false;
    }

    /**
     * Returns true if the given $class is a valid hero class. The validator
     * equals against 'slug'-names.
     * @param String $class
     * @return boolean
     */
    public static function validateClass($class) {
        return array_key_exists($class, self::getSettings()->get('BNET_CLASSES'));
    }

    /**
     * Returns true if $min and $max are within the constant given limits...
     * - MIN_LADDER_POSITION
     * - MAX_LADDER_POSITION
     * ... and if $min <= $max.
     * @param int $min
     * @param int $max
     * @return boolean
     */
    public static function validateMinMax($min, $max) {
        if($min > $max) {
            return false;
        }
        if($min < MIN_LADDER_POSITION || $min > MAX_LADDER_POSITION) {
            return false;
        }
        if($max < MIN_LADDER_POSITION || $max > MAX_LADDER_POSITION) {
            return false;
        } return true;
    }
    
}
