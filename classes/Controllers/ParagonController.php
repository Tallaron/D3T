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
        $data = unserialize(file_get_contents('data/paragon.dat'));
        $pc = new ParagonCalculator();
        $pc->setData($data);
        $pc->setNonSeason($pc->createParagon((int) $ns));
        $pc->setSeason($pc->createParagon((int) $s));
        $pc->setOverall(new \Entities\Paragon());
        $pc->getOverall()->setXp($pc->getOverallXp());
        $pc->getOverall()->setLevel($pc->getOverallLevel());
        \Views\View::getInstance()->assign('paragon', $pc);
        \Views\View::getInstance()->display('paragon/show_paragon.tpl');
    }
    
    
    
}
