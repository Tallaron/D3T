<?php

namespace Controllers;

class BuildController extends AbstractController {

    /**
     * Default action (behavior) for this controller.
     */
    public function indexAction() {
        $this->prepareNav();
        $randomBuilds = \Mappers\BuildDBMapper::findBuildMetaRandomised('2.6.0', 4);
        
        foreach($randomBuilds as $randomBuild) {
            $randomBuild->setClass( \Mappers\DBMapper::findHeroClassByBuildId( $randomBuild->getId() ) )
                        ->setScopeSolo( \Mappers\ScopeListMapper::createObject( 
                                        \Mappers\BuildDBMapper::findScopeByBuildIdAndGroup($randomBuild->getId(), 'solo') ) )
                        ->setScopeTeam( \Mappers\ScopeListMapper::createObject( 
                                        \Mappers\BuildDBMapper::findScopeByBuildIdAndGroup($randomBuild->getId(), 'team') ) );
        }
        
        \Views\View::getInstance()->assign('randomBuilds', $randomBuilds);
        \Views\View::getInstance()->display('builds/builds.tpl');
    }
    
    /**
     * Offers a small form for the meta data for a new build. No item, skill
     * or any other data may be delivered to the db with this form.
     */
    public function newAction() {
        if(EDIT_MODE) {
            $this->prepareNav();
            $date = new \DateTime();
            \Views\View::getInstance()->assign('defaultName', 'build_'.$date->format('d-m-y_H-i'));
            \Views\View::getInstance()->display('builds/new_build.tpl');
        } else {
            $this->redirect('build');
        }
    }

    /**
     * Creates a new record for a build. Only the build table with the
     * referring record will be affected. There are no items, skills etc.
     * involved at this time.
     */
    public function createAction() {
        if(EDIT_MODE) {
            $post = filter_input_array(INPUT_POST);
            $bId = \Mappers\BuildDBMapper::createBuild($post['class'], $post['name'], $post['version']);
            $this->redirect('build/edit/'.$bId);
        } else {
            $this->redirect('build');
        }
    }

    /**
     * Offers an edit form for the build identified by the given <b>$id</b>.
     * @param int $buildId
     */
    public function editAction($buildId) {
        if(EDIT_MODE) {
            $this->prepareNav();
            $build = \Mappers\BuildMapper::createObject($buildId);
            $lists = \Mappers\BuildListCollectionMapper::createObject($build);

            \Views\View::getInstance()->assign('lists', $lists);
            \Views\View::getInstance()->assign('build', $build);
            \Views\View::getInstance()->display('builds/edit_build.tpl');
        } else {
            $this->redirect('build');
        }
    }

    /**
     * Tries to save the build data submitted via <i>$_POST</i> into the db.
     */
    public function saveAction() {
        if(EDIT_MODE) {
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
            \Mappers\BuildDBMapper::saveScope($postObj);
            $this->redirect('build/edit/'.$postObj->id);
        } else {
            $this->redirect('build');
        }
    }
    
    public function showAction($id) {
        $this->prepareNav();
        $build = \Mappers\BuildMapper::createObject($id);        
        \Views\View::getInstance()->assign('build', $build);
        \Views\View::getInstance()->display('builds/show_build.tpl');
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
    
    /**
     * Returns a list of available builds grouped by the given array of classes.
     * @param array $classes
     * @return array
     */
    private function getBuildList($classes) {
        $builds = [];
        foreach($classes as $class) {
            $builds[$class->getKey()] = \Mappers\BuildDBMapper::findBuildMetaByClassKey($class->getKey());
        } return $builds;
    }
    
}
