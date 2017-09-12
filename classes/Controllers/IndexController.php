<?php

namespace Controllers;

class IndexController extends AbstractController {

    
    public function indexAction($estDays = D3_ESTIMATED_SEASON_DURATION) {
        $cal = new \Entities\Calendar(D3_CURRENT_SEASON_START_DATE, D3_CURRENT_SEASON_END_DATE, $estDays);
        
        $newsFeed = \Mappers\NewsFeedMapper::createObject('https://us.battle.net/d3/en/feed/news');
        \Views\View::getInstance()->assign('s', $_SESSION);
        \Views\View::getInstance()->assign('cal', $cal);
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
