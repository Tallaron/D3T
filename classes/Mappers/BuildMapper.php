<?php

namespace Mappers;

class BuildMapper {
    
    /**
     * 
     * @param StdObject $data From PDO::fetch
     * @return \Entities\Build
     */
    public static function createObject($data) {
        return (new \Entities\Build())
                ->setId( $data->id )
                ->setClassId( $data->class_id )
                ->setName( $data->name )
                ->setVersion( $data->version );
    }
    
    
    
    
}
