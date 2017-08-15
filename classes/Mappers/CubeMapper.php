<?php

namespace Mappers;

/**
 * Mapper for \Entities\Cube
 */
abstract class CubeMapper {

    /**
     * 
     * @param StdObject $data From json_decode
     * @return \Entities\Cube
     */
    public static function createObj($data) {
        $cube = new \Entities\Cube();
        foreach((array)$data as $key => $val) {
            if($val instanceof \Entities\Item) {
                $cube->addItem($val, $val->getType());
            } else {
                $cube->addItem( \Mappers\ItemMapper::createObj($val) , $key);
            }
        }
        return $cube;
    }

}
