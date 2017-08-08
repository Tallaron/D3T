<?php

namespace Controllers;

class BuildController extends AbstractController {

    
    public function indexAction() {
        $classes = \Mappers\DBMapper::findAllHeroClasses();
        $builds = $this->getBuildList($classes);
        \Views\View::getInstance()->assign('heroClasses', $classes);
        \Views\View::getInstance()->assign('builds', $builds);
        \Views\View::getInstance()->display('builds/builds.tpl');
    }
    
    
    /**
     * Offers a small form for the meta data for a new build. No item, skill
     * or any other data may be delivered to the db with this form.
     */
    public function newAction() {
        $this->prepareNav();
        $date = new \DateTime();
        \Views\View::getInstance()->assign('defaultName', 'build_'.$date->format('d-m-y_H-i'));
        \Views\View::getInstance()->assign('content', 'newBuild'); //content switch case
        \Views\View::getInstance()->display('builds/builds.tpl');
    }

    /**
     * Creates a new record for a build. Only the build table with the
     * referring record will be affected. There are no items, skills etc.
     * involved at this time.
     */
    public function createAction() {
        $post = filter_input_array(INPUT_POST);
        $bId = \Mappers\BuildDBMapper::createBuild($post['class'], $post['name'], $post['version']);
        $this->redirect('build/edit/'.$bId);
    }

    /**
     * Offers an edit form for the build identified by the given <b>$id</b>.
     * @param int $buildId
     */
    public function editAction($buildId) {
        $this->prepareNav();
        $build = \Mappers\BuildMapper::createObject($buildId);
        $lists = \Mappers\BuildListCollectionMapper::createObject($build);
        
        \Views\View::getInstance()->assign('lists', $lists);
        \Views\View::getInstance()->assign('build', $build);
        \Views\View::getInstance()->assign('content', 'editBuild'); //content switch case
        \Views\View::getInstance()->display('builds/builds.tpl');
    }

    


    
    public function saveAction() {
        $postObj = json_decode(
                        json_encode(
                            filter_input_array(INPUT_POST)
                            ), false
                    );
        
        \Mappers\BuildDBMapper::updateMeta($postObj);
        \Mappers\BuildDBMapper::saveCube($postObj);
        \Mappers\BuildDBMapper::saveItems($postObj);
        \Mappers\BuildDBMapper::saveActiveSkills($postObj);
        \Mappers\BuildDBMapper::savePassiveSkills($postObj);
        $this->redirect('build/edit/'.$postObj->id);
    }
    




    
    
    public function showAction($id) {
        $this->prepareNav();
        $build = \Mappers\BuildMapper::createObject($id);        
        \Views\View::getInstance()->assign('build', $build);
        \Views\View::getInstance()->assign('content', 'showBuild'); //content switch case
        \Views\View::getInstance()->display('builds/builds.tpl');
    }

    














    /**
     * Just for reducing redundancy...
     */
    private function prepareNav() {
        $classes = \Mappers\DBMapper::findAllHeroClasses();
        $builds = $this->getBuildList($classes);
        \Views\View::getInstance()->assign('heroClasses', $classes);
        \Views\View::getInstance()->assign('builds', $builds);
    }

    
    /**
     * Endpoint to receive a list of runes for the specified skill.
     * @param int $skillId
     */
    public function runeAction($skillId) {
        $runes = \Mappers\DBMapper::findRawRunesBySkillId($skillId);
        \Views\View::getInstance()->assign('runes', $runes);
        \Views\View::getInstance()->display('builds/form_parts/runes_options.tpl');
    }
    
    private function getBuildList($classes) {
        $builds = [];
        foreach($classes as $class) {
            $builds[$class->getKey()] = \Mappers\BuildDBMapper::findBuildMetaByClassKey($class->getKey());
        } return $builds;
    }


    
}
