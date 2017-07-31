<?php

namespace Controllers;

class ImportController {

    public function indexAction() {
//        if(IMPORT_ENABLED) {
//
//            foreach(\Mappers\DBMapper::findAllHeroClasses() as $heroClass) {
//                echo '<h2>'.$heroClass->name.'</h2>';
//                echo '<pre>';
//                print_r($this->importActiveSkill($heroClass));
//                echo '</pre>';
//            }
//            
//        }        
        
    }
    
    
    
    public function activeAction($heroClass) {
        if(IMPORT_ENABLED) {
            $heroClass = \Mappers\DBMapper::findHeroClassByKey(strtolower($heroClass));
            $skills = $this->importActiveSkills($heroClass);
            foreach($skills as $skill) {
                \Mappers\DBMapper::saveActiveSkill($skill);
            }
        }
        
    }
    
    public function passiveAction($heroClass) {
        if(IMPORT_ENABLED) {
            $heroClass = \Mappers\DBMapper::findHeroClassByKey(strtolower($heroClass));
            $skills = $this->importPassiveSkills($heroClass);
            foreach($skills as $skill) {
                \Mappers\DBMapper::savePassiveSkill($skill);
            }
        }
    }

    
    
    public function itemAction($type) {
        if(IMPORT_ENABLED) {
            $itemType = \Mappers\DBMapper::findItemTypeByKey($type);
            $items = $this->importItems($itemType);
            foreach($items as $item) {
                \Mappers\DBMapper::saveItem($item);
            }
        }
    }
    









    private function importActiveSkills($heroClass) {
        $url = sprintf(ACTIVE_SKILL_IMPORT_URL, $heroClass->key);
        $importer = new \Helper\ActiveSkillImporter($url);
        $importer
                ->setHeroClass($heroClass->id)
                ->proceed();
        return $importer->getSkills();
    }
    
    private function importPassiveSkills($heroClass) {
        $url = sprintf(PASSIVE_SKILL_IMPORT_URL, $heroClass->key);
        $importer = new \Helper\PassiveSkillImporter($url);
        $importer
                ->setHeroClass($heroClass->id)
                ->proceed();
        return $importer->getSkills();
    }
    
    private function importItems($itemType) {
        $url = sprintf(ITEM_IMPORT_URL, $itemType->key);
        $importer = new \Helper\ItemImporter($url);
        $importer
                ->setItemType($itemType->id)
                ->proceed();
        return $importer->getItems();
    }
    
    
    
}
