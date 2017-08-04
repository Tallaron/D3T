<?php

namespace Mappers;

class EditorCubeMapper {

    public static function createObject($data) {
        $obj = new \Entities\EditorCube();
        foreach($data as $item) {
            $method = 'set'.ucfirst($item->type);
            if(method_exists($obj, $method)) {
                $obj->$method($item->itemId);
            }
        }
        return $obj;
    }
    
}
