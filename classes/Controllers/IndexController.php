<?php

namespace Controllers;

class IndexController extends AbstractController {

    
    public function indexAction() {
        $newsFeed = \Mappers\NewsFeedMapper::createObject('https://us.battle.net/d3/en/feed/news');
        \Views\View::getInstance()->assign('s', $_SESSION);
        \Views\View::getInstance()->assign('msg', self::getMsg());
        \Views\View::getInstance()->assign('newsFeed', $newsFeed);
        \Views\View::getInstance()->display('home.tpl');
    }
    
    
    public function restartAction() {
        $_SESSION = array();
        unset($_SESSION);
        session_destroy();
        $this->redirect('');
    }
    
    
    
}
