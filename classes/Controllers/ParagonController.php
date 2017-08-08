<?php

namespace Controllers;

class ParagonController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('paragon/paragon_form.tpl');
    }
    
    public function calcAction() {
        $post = filter_input_array(INPUT_POST);
        $this->redirect('paragon/show/'.$post['parans'].'/'.$post['paras']);
    }

    

    public function showAction($ns = 0, $s = 0) {
        $pc = \Mappers\ParagonCalculationMapper::createObject($ns, $s);
        \Views\View::getInstance()->assign('paragon', $pc);
        \Views\View::getInstance()->display('paragon/show_paragon.tpl');
    }
    
    
}
