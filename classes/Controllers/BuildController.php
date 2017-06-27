<?php

namespace Controllers;

class BuildController extends AbstractController {

    
    public function indexAction() {
        $this->barbAction();
    }
    
    public function barbAction($param = null) {
        
        
        
        
        \Views\View::getInstance()->assign('cls', 'barb');
        \Views\View::getInstance()->display('builds.tpl');
    }
    
    public function crusAction($param = null) {
        \Views\View::getInstance()->assign('cls', 'crus');
        \Views\View::getInstance()->display('builds.tpl');
    }
    
    public function dhAction($param = null) {
        \Views\View::getInstance()->assign('cls', 'dh');
        \Views\View::getInstance()->display('builds.tpl');
    }
    
    public function monkAction($param = null) {
        \Views\View::getInstance()->assign('cls', 'monk');
        \Views\View::getInstance()->display('builds.tpl');
    }
    
    public function necroAction($param = null) {
        \Views\View::getInstance()->assign('cls', 'necro');
        \Views\View::getInstance()->display('builds.tpl');
    }
    
    public function wdAction($param = null) {
        \Views\View::getInstance()->assign('cls', 'wd');
        \Views\View::getInstance()->display('builds.tpl');
    }
    
    public function wizAction($param = null) {
        \Views\View::getInstance()->assign('cls', 'wiz');
        \Views\View::getInstance()->display('builds.tpl');
    }
    
    
}
