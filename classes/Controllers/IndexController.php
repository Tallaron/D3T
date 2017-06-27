<?php

namespace Controllers;

class IndexController extends AbstractController {

    
    public function indexAction() {
        $nfm = new \Mappers\newsFeedMapper('https://us.battle.net/d3/en/feed/news');
        \Views\View::getInstance()->assign('newsFeed', $nfm->getNewsFeed());
        \Views\View::getInstance()->display('home.tpl');
    }
    
    
    public function restartAction() {
        $_SESSION = array();
        unset($_SESSION);
        session_destroy();
        $this->redirect('');
    }
    
    
    
}
