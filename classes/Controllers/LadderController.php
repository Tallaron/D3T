<?php

namespace Controllers;

class LadderController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('ladder/ladder_form.tpl');
    }
    
    public function loadAction() {
        $post = filter_input_array(INPUT_POST);
        $_SESSION["names"] = strip_tags( trim(trim($post["names"], ";")) );
        $this->redirect('ladder/show/'.$post['realm'].'/'.$post['mode'].'/'.$post['num'].'/'.$post['class'].'/'.$post['min'].'/'.$post['max']);
    }

    



    public function showAction($realm, $mode, $num, $class, $min, $max) {
        $_SESSION['error_tpl'] = 'ladder/ladder_retry_button';
        $_SESSION['error_content'] = BASE_DIR . '/ladder/show/'.$realm.'/'.$mode.'/'.$num.'/'.$class.'/'.$min.'/'.$max;
        $ranking = new \Entities\Ranking(self::$settings);
        $ranking->setRealm($realm)
                ->setMode($mode)
                ->setNum($num)
                ->setClass($class)
                ->setRange($min, $max)
                ->setNames($_SESSION["names"]);
        $ranking->loadData();
        
        \Views\View::getInstance()->assign('ranking', $ranking);
        \Views\View::getInstance()->display('ladder/show_ladder.tpl');
    }
    
    
    
}
