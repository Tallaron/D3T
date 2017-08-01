<?php

namespace Controllers;

class ImportController extends AbstractController {

    public function indexAction() {
        if(!isset($_SESSION['imports_done'])) {
            $_SESSION['imports_done'] = [];
        }
        
        echo '<pre>';
        print_r($_SESSION['imports_done']);
        echo '</pre>';
        
        if(IMPORT_ENABLED) {
            
            /* Import items */
            foreach(\Mappers\DBMapper::findAllItemTypes() as $itemType) {
                try {
                    if(!$this->isDone('item', $itemType->key)) {
                        $this->itemAction($itemType->key);
                        $_SESSION['imports_done'][] = 'item:'.$itemType->key;
                        echo 'importItem: '. $itemType->name . ': done<br>';
                    } else {
                        echo 'importItem: '. $itemType->name . ': allready done<br>';
                    }
                } catch(\Exception $e) {
                    echo 'importItem: '. $itemType->name . ': failed<br>';
                }
            }
            
            /* Import active skills and runes */
            foreach(\Mappers\DBMapper::findAllHeroClasses() as $heroClass) {
                try {
                    if(!$this->isDone('aSkill', $heroClass->key)) {
                        $this->activeAction($heroClass->key);
                        $_SESSION['imports_done'][] = 'aSkill:'.$heroClass->key;
                        echo 'importASkill: '. $heroClass->name . ': done<br>';
                    } else {
                        echo 'importASkill: '. $heroClass->name . ': allready done<br>';
                    }
                } catch(\Exception $e) {
                    echo 'importASkill: '. $heroClass->name . ': failed<br>';
                }
            }
            
            /* Import passive skills */
            foreach(\Mappers\DBMapper::findAllHeroClasses() as $heroClass) {
                try {
                    if(!$this->isDone('pSkill', $heroClass->key)) {
                        $this->passiveAction($heroClass->key);
                        $_SESSION['imports_done'][] = 'pSkill:'.$heroClass->key;
                        echo 'importPSkill: '. $heroClass->name . ': done<br>';
                    } else {
                        echo 'importPSkill: '. $heroClass->name . ': allready done<br>';
                    }
                } catch(\Exception $e) {
                    echo 'importPSkill: '. $heroClass->name . ': failed<br>';
                }
            }

        }        
        $this->redirect();
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
    
    
    
    
    
    
    private function isDone($actionType, $key) {
        return in_array($actionType.':'.$key, $_SESSION['imports_done']);
    }
    
    
    
    
}
