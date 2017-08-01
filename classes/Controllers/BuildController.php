<?php

namespace Controllers;

class BuildController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('builds/builds.tpl');
    }
    
    
    
    public function newAction() {
        $date = new \DateTime();
        \Views\View::getInstance()->assign('defaultName', 'build_'.$date->format('d-m-y_H-i'));
        \Views\View::getInstance()->assign('heroClasses', \Mappers\DBMapper::findAllHeroClasses());
        \Views\View::getInstance()->display('builds/new_build_form.tpl');
    }

    public function createAction() {
        $post = filter_input_array(INPUT_POST);
        $bId = \Mappers\DBMapper::createBuild($post['class'], $post['name'], $post['version']);
        $this->redirect('build/edit/'.$bId);
    }

    public function editAction($buildId) {
        $build = \Mappers\BuildMapper::createObject(
                                    \Mappers\DBMapper::findBuildById($buildId));
        
        $activeSkills = \Mappers\DBMapper::findAllActiveSkillsByClassId( $build->getClassId() );
        $passiveSkills = \Mappers\DBMapper::findAllPassiveSkillsByClassId( $build->getClassId() );
        
        
        
        \Views\View::getInstance()->assign('heroClasses', \Mappers\DBMapper::findAllHeroClasses());
        \Views\View::getInstance()->assign('activeSkills', $activeSkills);
        \Views\View::getInstance()->assign('passiveSkills', $passiveSkills);
        \Views\View::getInstance()->assign('build', $build);
        \Views\View::getInstance()->display('builds/edit_build_form.tpl');
    }

    










    






    
    
    public function saveAction() {
        echo '<pre>';
        print_r(json_decode(json_encode($_POST),false));
        die();
    }
    
    
}
