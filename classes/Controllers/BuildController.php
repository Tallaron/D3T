<?php

namespace Controllers;

class BuildController extends AbstractController {

    
    public function indexAction() {
        
        $classes = \Mappers\DBMapper::findAllHeroClasses();
        $builds = [];
        
        foreach($classes as $class) {
            $builds[$class->key] = \Mappers\BuildDBMapper::findBuildMetaByKey($class->key);
        }
        
        \Views\View::getInstance()->assign('heroClasses', $classes);
        \Views\View::getInstance()->assign('builds', $builds);
        \Views\View::getInstance()->display('builds/builds.tpl');
    }
    
    
    /**
     * Offers a small form for the meta data for a new build. No item, skill
     * or any other data may be delivered to the db with this form.
     */
    public function newAction() {
        $date = new \DateTime();
        \Views\View::getInstance()->assign('defaultName', 'build_'.$date->format('d-m-y_H-i'));
        \Views\View::getInstance()->assign('heroClasses', \Mappers\DBMapper::findAllHeroClasses());
        \Views\View::getInstance()->display('builds/new_build_form.tpl');
    }

    /**
     * Creates a new record for a build. Only the build table with the
     * referring record will be affected. There are no items, skills etc.
     * involved at this time.
     */
    public function createAction() {
        $post = filter_input_array(INPUT_POST);
        $bId = \Mappers\DBMapper::createBuild($post['class'], $post['name'], $post['version']);
        $this->redirect('build/edit/'.$bId);
    }

    /**
     * Offers an edit form for the build identified by the given <b>$id</b>.
     * @param int $buildId
     */
    public function editAction($buildId) {
        $build = \Mappers\BuildDBMapper::findBuildById($buildId);
        $lists = \Mappers\BuildListCollectionMapper::createObject($build);
        
        $cube = \Mappers\EditorCubeMapper::createObject(
                                \Mappers\BuildDBMapper::findCubeById($buildId));
        $inventory = \Mappers\EditorInventoryMapper::createObject(
                                \Mappers\BuildDBMapper::findInventoryById($buildId));
        $activeSkills = \Mappers\EditorSkillSetMapper::createObject(
                                \Mappers\BuildDBMapper::findActiveSkillsById($buildId));
        $runeLists = [];
        foreach($activeSkills->getSkills() as $activeSkill) {
            $runeLists[$activeSkill->getIndex()] = \Mappers\BuildDBMapper::findRawRunesBySkillId( $activeSkill->getSkillId() );
        }
        $passiveSkills = \Mappers\EditorSkillSetMapper::createObject(
                                \Mappers\BuildDBMapper::findPassiveSkillsById($buildId));
        
        
        \Views\View::getInstance()->assign('heroClasses', \Mappers\DBMapper::findAllHeroClasses());
        \Views\View::getInstance()->assign('lists', $lists);
        \Views\View::getInstance()->assign('runeLists', $runeLists);
        \Views\View::getInstance()->assign('build', $build);
        \Views\View::getInstance()->assign('cube', $cube);
        \Views\View::getInstance()->assign('inventory', $inventory);
        \Views\View::getInstance()->assign('activeSkills', $activeSkills);
        \Views\View::getInstance()->assign('passiveSkills', $passiveSkills);
        \Views\View::getInstance()->display('builds/edit_build_form.tpl');
    }

    


    
    /**
     * 
     */
    public function saveAction() {
        $postObj = json_decode(
                        json_encode(
                            filter_input_array(INPUT_POST)
                            ), false
                    );
        
        \Mappers\BuildDBMapper::saveMeta($postObj);
        \Mappers\BuildDBMapper::saveCube($postObj);
        \Mappers\BuildDBMapper::saveItems($postObj);
        \Mappers\BuildDBMapper::saveActiveSkills($postObj);
        \Mappers\BuildDBMapper::savePassiveSkills($postObj);
        
        
        
        $this->redirect('build/edit/'.$postObj->id);
    }
    







    public function runeAction($skillId) {
        $runes = \Mappers\BuildDBMapper::findRawRunesBySkillId($skillId);
        \Views\View::getInstance()->assign('runes', $runes);
        \Views\View::getInstance()->display('builds/form_parts/runes_options.tpl');
    }






    
}
