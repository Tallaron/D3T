<?php

namespace Controllers;

class TwitchController {

    
    public function indexAction() {
        \Views\View::getInstance()->assign('channel', TWITCH_DEFAULT_CHANNEL);
        \Views\View::getInstance()->display('twitch.tpl');
    }
    
    
    
}
