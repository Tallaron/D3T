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
        
        $gems = array_merge(
            \Mappers\DBMapper::findAllGems(['default'], [10]),
            \Mappers\DBMapper::findAllGems(['legendary'], [1])
        );
        
        $items = [
            'head' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['head']),
            'torso' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['torso']),
            'waist' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['waist']),
            'legs' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['legs']),
            'feet' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['feet']),
            'shoulders' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['shoulders']),
            'hands' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['hands']),
            'leftFinger' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['leftFinger']),
            'mainHand' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['mainHand']),
            'offHand' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], 
                                                    in_array($build->getClassId(), [1,3,4]) ?
                                                        ['offHand', 'mainHand'] :
                                                        ['offHand'] ),
            'rightFinger' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['rightFinger']),
            'bracers' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['bracers']),
            'neck' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['neck']),
        ];
        
        $cube = [
            'weapon' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['mainHand', 'offHand']),
            'armor' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['head', 'torso', 'waist', 'legs', 'feet', 'shoulders', 'hands', 'bracers']),
            'jewelry' => \Mappers\DBMapper::findAllItems([8, $build->getClassId()], ['leftFinger', 'neck']),
        ];
        
        \Views\View::getInstance()->assign('heroClasses', \Mappers\DBMapper::findAllHeroClasses());
        \Views\View::getInstance()->assign('activeSkills', $activeSkills);
        \Views\View::getInstance()->assign('passiveSkills', $passiveSkills);
        \Views\View::getInstance()->assign('gems', $gems);
        \Views\View::getInstance()->assign('items', $items);
        \Views\View::getInstance()->assign('cube', $cube);
        \Views\View::getInstance()->assign('build', $build);
        \Views\View::getInstance()->display('builds/edit_build_form.tpl');
    }

    










    






    
    
    public function saveAction() {
        echo '<pre>';
        print_r(json_decode(json_encode($_POST),false));
        die();
    }
    
    
}
