<?php

namespace Mappers;

class PassiveSkillMapper {

    private $skill;

    public function __construct($data) {
        $this->setSkill(new \Entities\PasiveSkill());
        $this->getSkill()->setSlug($data->slug);
        $this->getSkill()->setName($data->name);
        $this->getSkill()->setIcon($data->icon);
        $this->getSkill()->setTooltipUrl($data->tooltipUrl);
        $this->getSkill()->setDescription($data->description);
    }

    public function getSkill() {
        return $this->skill;
    }

    public function setSkill($skill) {
        $this->skill = $skill;
        return $this;
    }

}
