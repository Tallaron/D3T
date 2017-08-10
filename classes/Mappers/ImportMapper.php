<?php

namespace Mappers;

class ImportMapper {

    public function __construct() {
        if(!isset($_SESSION['imports_done']) || !is_array($_SESSION['imports_done'])) {
            $_SESSION['imports_done'] = [];
        }
    }
    
    
    
    
    
    
    
    
    public function importItems($key) {
        $itemType = \Mappers\DBMapper::findItemTypeByKey($key);
        $importer = new \Helper\ItemImporter($itemType);
        $importer->proceed();
        foreach($importer->getItems() as $item) {
            \Mappers\DBMapper::saveItem($item);
        }
        $this->markAsDone('item'.$itemType->getKey());
    }

    public function importActiveSkills($key) {
        $heroClass = \Mappers\DBMapper::findHeroClassByKey($key);
        $importer = new \Helper\ActiveSkillImporter($heroClass);
        $importer->proceed();
        foreach($importer->getSkills() as $skill) {
            \Mappers\DBMapper::saveActiveSkill($skill);
        }
        $this->markAsDone('aSkill'.$heroClass->getKey());
    }

    public function importPassiveSkills($key) {
        $heroClass = \Mappers\DBMapper::findHeroClassByKey($key);
        $importer = new \Helper\PassiveSkillImporter($heroClass);
        $importer->proceed();
        foreach($importer->getSkills() as $skill) {
            \Mappers\DBMapper::savePassiveSkill($skill);
        }
        $this->markAsDone('pSkill'.$heroClass->getKey());
    }

    public function importGems() {
        $importer = new \Helper\GemImporter();
        $importer->proceed();
        foreach($importer->getGems() as $gem) {
            \Mappers\DBMapper::saveGem($gem);
        }
        $this->markAsDone('gem');
    }
    




    private function markAsDone($key) {
        $_SESSION['imports_done'][] = $key;
    }


    public function isDone($key) {
        return in_array($key, $_SESSION['imports_done']);
    }


    
}
