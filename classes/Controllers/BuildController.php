<?php

namespace Controllers;

class BuildController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('builds/builds.tpl');
    }
    

    public function addAction() {
        $content = 'addNewBuild';
        $itemTypes = ['head','torso','waist','legs','feet','shoulders',
                    'hands','leftFinger','mainHand','offHand','bracers','neck'];
        $items = [];
        $dbc = new \Controllers\DBController();
        
        foreach($itemTypes as $itemType) {
            $items[$itemType] = $dbc->findAllBySlotKey($itemType);
        }
        
        \Views\View::getInstance()->assign('items', $items);
        \Views\View::getInstance()->assign('content', $content);
        \Views\View::getInstance()->display('builds/builds.tpl');
    }
    
    
    public function saveAction() {
        echo '<pre>';
        print_r(json_decode(json_encode($_POST),false));
        die();
    }
    
    
}
