<?php

namespace Controllers;

class LadderController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('ladder/ladder_form.tpl');
    }
    
    public function loadAction() {
        $post = filter_input_array(INPUT_POST);
        $_SESSION["search"] = strip_tags( $post["search"] );
        $this->redirect('ladder/show/'.$post['realm'].'/'.$post['season'].'/'.$post['hardcore'].'/'.$post['index'].'/'.$post['class'].'/'.$post['min'].'/'.$post['max']);
    }

    



    public function showAction($realm, $season, $hardcore, $index, $class, $min, $max) {
        $lm = new \Mappers\LadderMapper();
        $lm->initLadder($realm, $season, $hardcore, $index, $class, $min, $max);
        $lm->initSearch($_SESSION['search']);
        $lm->loadLadderData(self::$settings);
        
        \Views\View::getInstance()->assign('ladder', $lm->getLadder());
        \Views\View::getInstance()->display('ladder/show_ladder.tpl');
    }
    
    
    
}
