<?php

namespace Controllers;

class ErrorController extends AbstractController {

    
    public function indexAction() {
        if(isset($_SESSION['error'])) {
            \Views\View::getInstance()->assign('error', $_SESSION['error']);
            unset($_SESSION['error']);
        } else {
            \Views\View::getInstance()->assign('error', ERROR_UNKNOWN);
        }
        \Views\View::getInstance()->display('error.tpl');
    }
    
    
    
}
