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
        for($i = 0; $i < count($data); $i++) {
            $cube->addItem( \Mappers\ItemMapper::createObj($data[$i]) , $i);
        }
        return $cube;
    }

}
