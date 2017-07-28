<?php

namespace Controllers;

class ImportController extends DBController {

    public function indexAction() {
//        if(IMPORT_ENABLED) {
//
//            foreach($this->findAllHeroClasses() as $heroClass) {
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
            $heroClass = $this->findHeroClassByKey($heroClass);
                echo '<h2>'.$heroClass->name.'</h2>';
                echo '<pre>';
                print_r($this->importActiveSkill($heroClass));
                echo '</pre>';
        }
        
    }

    









    private function importActiveSkill($heroClass) {
        $url = sprintf(ACTIVE_SKILL_IMPORT_URL, $heroClass->key);
        $importer = new \Helper\ActiveSkillImporter($url);
        $importer
                ->setHeroClass($heroClass->id)
                ->proceed();
        return $importer->getSkills();
    }
    
    
    
}
