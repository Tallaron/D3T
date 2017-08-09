<?php

namespace Mappers;

/**
 * Mapper for \Entities\Gem
 */
abstract class GemMapper {

    /**
     * 
     * @param StdObject $data From json_decode
     * @return \Entities\Gem
     */
    public static function createObj($data) {
        $gem = new \Entities\Gem();
        foreach($data as $k => $v) {
            $method = 'set'.ucfirst($k);
            if(method_exists($gem, $method)) {
                $gem->$method($v);
            }
        }
        return $gem;
    }

}
