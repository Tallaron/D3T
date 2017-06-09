<?php

namespace Controllers;

class IndexController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('home.tpl');
    }
    
    
    public function restartAction() {
        $_SESSION = array();
        unset($_SESSION);
        session_destroy();
        $this->redirect('');
    }
    
    
    
}
