<?php

namespace Controllers;

class BuildController extends AbstractController {

    
    public function indexAction() {
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
        $build = \Mappers\DBMapper::findBuildById($buildId);
        $lists = \Mappers\BuildListCollectionMapper::createObject($build);

        \Views\View::getInstance()->assign('heroClasses', \Mappers\DBMapper::findAllHeroClasses());
        \Views\View::getInstance()->assign('lists', $lists);
        \Views\View::getInstance()->assign('build', $build);
        \Views\View::getInstance()->display('builds/edit_build_form.tpl');
    }

    


    
    /**
     * 
     */
    public function saveAction() {
        $post = filter_input_array(INPUT_POST);
        \Mappers\DBMapper::saveBuildCube(json_decode(json_encode($post), false));
        
        
//        echo '<pre>';
//        print_r(json_decode(json_encode($_POST),false));
//        die();
    }
    













    
}
