<?php

namespace Controllers;

class ImportController extends AbstractController {

    /**
     * This method contains several loops that will end up in a fatal timeout.
     * To avoid script termination and as of it termination of the automated
     * imports, there is a shutdown function used <b>import_handle</b>.
     * 
     * That function will restart the import script again and again until all
     * imports are done w/o timeouts.
     * 
     * The script works with some kind of task list managed within the
     * <b>$_SESSION</b>. At the end of each single import there is a individual
     * key stored in the <b>$_SESSION</b>. Before a single import will be
     * started the script checks if the task is already done in the current
     * batch to prevent for endless timeouts while redoing the tasks over and
     * over again.
     */
    public function indexAction() {
        if(IMPORT_ENABLED) {
            self::setMsg( isset($_SESSION['imports_done']) ? $_SESSION['imports_done'] : [] );
            register_shutdown_function('import_handle');
            $importMapper = new \Mappers\ImportMapper();
            
            /* Import items */
            foreach(\Mappers\DBMapper::findAllItemTypes() as $itemType) {
                if(!$importMapper->isDone('item'.$itemType->getKey())) {
                    $importMapper->importItems($itemType->getKey());
                    self::addMsg('item'.$itemType->getKey());
                }
            }
            
            /* Import active skills and runes */
            foreach(\Mappers\DBMapper::findAllHeroClasses() as $heroClass) {
                if(!$importMapper->isDone('aSkill'.$heroClass->getKey())) {
                    $importMapper->importActiveSkills($heroClass->getKey());
                    self::addMsg('aSkill'.$heroClass->getKey());
                }
            }
            
            /* Import passive skills */
            foreach(\Mappers\DBMapper::findAllHeroClasses() as $heroClass) {
                if(!$importMapper->isDone('pSkill'.$heroClass->getKey())) {
                    $importMapper->importPassiveSkills($heroClass->getKey());
                    self::addMsg('pSkill'.$heroClass->getKey());
                }
            }
            
            if(!$importMapper->isDone('gem')) {
                $importMapper->importGems();
                self::addMsg('gem');
            }

        }
        self::addMsg('all imports done!');
        $this->redirect();
    }
    
    
    
    public function activeAction($heroClass = false) {
        if(IMPORT_ENABLED) {
            if($heroClass !== false) {
                $heroClass = \Mappers\DBMapper::findHeroClassByKey(strtolower($heroClass));
                (new \Mappers\ImportMapper())->importActiveSkills($heroClass->getKey());
                self::addMsg('aSkill'.$heroClass->getKey());
            }
        }
        $this->redirect();
    }

    public function passiveAction($heroClass = false) {
        if(IMPORT_ENABLED) {
            if($heroClass !== false) {
                $heroClass = \Mappers\DBMapper::findHeroClassByKey(strtolower($heroClass));
                (new \Mappers\ImportMapper())->importPassiveSkills($heroClass->getKey());
                self::addMsg('pSkill'.$heroClass->getKey());
            }
        }
        $this->redirect();
    }

    public function itemAction($type = false) {
        if(IMPORT_ENABLED) {
            if($itemType !== false) {
                $itemType = \Mappers\DBMapper::findItemTypeByKey(strtolower($type));
                (new \Mappers\ImportMapper())->importItems($itemType->getKey());
                self::addMsg('item'.$itemType->getKey());
            }
        }
        $this->redirect();
    }
    
    public function gemAction() {
        if(IMPORT_ENABLED) {
            (new \Mappers\ImportMapper())->importGems();
            self::addMsg('gem');
        }
        $this->redirect();
    }
    
}
