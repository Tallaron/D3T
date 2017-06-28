<?php

namespace Mappers;

class RuneMapper {
    
    private $rune;
    

    public function __construct($data) {
        $this->setRune(new \Entities\Rune());
        $this->getRune()->setSlug($data->slug);
        $this->getRune()->setName($data->name);
        $this->getRune()->setDescription($data->description);
        $this->getRune()->setSimpleDescription($data->simpleDescription);
        $this->getRune()->setTooltipParams($data->tooltipParams);
    }
    
    public function getRune() {
        return $this->rune;
    }

    public function setRune($rune) {
        $this->rune = $rune;
        return $this;
    }
}
