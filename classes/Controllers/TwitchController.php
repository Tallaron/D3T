<?php

namespace Controllers;

class TwitchController {

    public function indexAction() {
        \Views\View::getInstance()->assign('channel', TWITCH_DEFAULT_CHANNEL);
        \Views\View::getInstance()->display('twitch.tpl');
    }

    public static function isOnline($channel = TWITCH_DEFAULT_CHANNEL) {
        $data = json_decode(file_get_contents(TWITCH_API_ROOT . '/streams/' . $channel . '?client_id=' . TWITCH_CLIENT_ID));
        if ($data->stream != null) {
            return true;
        } return false;
    }

}
