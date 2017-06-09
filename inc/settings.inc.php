<?php

define('BASE_DIR', '/d3.tallaron.de');

define('SMARTY_TPL_DIR', 'tpl/');
define('SMARTY_COMP_DIR', 'tpl_c/');
define('SMARTY_CACHE_DIR', 'cache/');
define('SMARTY_CACHE', false);
define('SMARTY_CACHE_LIFETIME', 60);

define('RANKING_DEFAULT_REALM', 'eu');
define('RANKING_DEFAULT_MODE', 'era');
define('RANKING_DEFAULT_SELECT_MODE', 'n');
define('RANKING_DEFAULT_TYPE', '');
define('RANKING_DEFAULT_NUM', '7');
define('RANKING_DEFAULT_CLASS', 'team-4');
define('RANKING_DEFAULT_MIN', '1');
define('RANKING_DEFAULT_MAX', '1000');
define('RANKING_DEFAULT_LANG', 'en');


const BNET_URL = array(
    'eu' => 'https://eu.battle.net/',
    'us' => 'https://us.battle.net/',
    'kr' => 'https://kr.battle.net/',
);

const BNET_REALM_NAME = array(
    'eu' => 'Europe',
    'us' => 'America',
    'kr' => 'Korea',
);

const BNET_MODE = array(
    'n' => 'Normal (Era)',
    'hc' => 'Hardcore (Era)',
    's' => 'Seasonal (Season)',
    'shc' => 'Seasonal Hardcore (Season)',
);

const BNET_MIN_ERA = 1;
const BNET_MAX_ERA = 7;
const BNET_MIN_SEASON = 1;
const BNET_MAX_SEASON = 10;

const BNET_CLASSES = array(
    'barbarian'  => 'Barbarian',
    'crusader'  => 'Crusader',
    'dh'        => 'Demon Hunter',
    'monk'      => 'Monk',
    'wd'        => 'Witch Doctor',
    'wizard'    => 'Wizard',
    'team-2'    => '2 Player',
    'team-3'    => '3 Player',
    'team-4'    => '4 Player',
);
