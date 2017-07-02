<?php

namespace Mappers;

/**
 * Mapper for \Entities\Rune
 */
abstract class RuneMapper {

    /**
     * 
     * @param StdObject $data From json_decode
     * @return \Entities\Rune()
     */
    public static function createObj($data) {
        return (new \Entities\Rune())
            ->setSlug($data->slug)
            ->setName($data->name)
            ->setDescription($data->description)
            ->setSimpleDescription($data->simpleDescription)
            ->setTooltipParams($data->tooltipParams);
    }
    
}
