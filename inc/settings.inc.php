<?php


define('BASE_DIR', '/d3.tallaron.de');

define('SMARTY_TPL_DIR', 'tpl/');
define('SMARTY_COMP_DIR', 'tpl_c/');
define('SMARTY_CACHE_DIR', 'cache/');
define('SMARTY_CACHE', false);
define('SMARTY_CACHE_LIFETIME', 60);



$settings = new \Controllers\Settings();
$settings->addContext('RANKING_DEFAULT_REALM', 'eu')
        ->addContext('RANKING_DEFAULT_MODE', 'era')
        ->addContext('RANKING_DEFAULT_SELECT_MODE', 'n')
        ->addContext('RANKING_DEFAULT_TYPE', '')
        ->addContext('RANKING_DEFAULT_NUM', '7')
        ->addContext('RANKING_DEFAULT_CLASS', 'team-4')
        ->addContext('RANKING_DEFAULT_MIN', '1')
        ->addContext('RANKING_DEFAULT_MAX', '1000')
        ->addContext('RANKING_DEFAULT_LANG', 'en')
        ->addContext('BNET_MIN_ERA', 1)
        ->addContext('BNET_MAX_ERA', 7)
        ->addContext('BNET_MIN_SEASON', 1)
        ->addContext('BNET_MAX_SEASON', 10)
        ->addContext('BNET_URL', array(
                        'eu' => 'https://eu.battle.net/',
                        'us' => 'https://us.battle.net/',
                        'kr' => 'https://kr.battle.net/',))
        ->addContext('BNET_REALM_NAME', array(
                        'eu' => 'Europe',
                        'us' => 'America',
                        'kr' => 'Korea',))
        ->addContext('BNET_MODE', array(
                    'n' => 'Normal (Era)',
                    'hc' => 'Hardcore (Era)',
                    's' => 'Seasonal (Season)',
                    'shc' => 'Seasonal Hardcore (Season)',))
        ->addContext('BNET_CLASSES', array(
                    'barbarian'  => 'Barbarian',
                    'crusader'  => 'Crusader',
                    'dh'        => 'Demon Hunter',
                    'monk'      => 'Monk',
                    'wd'        => 'Witch Doctor',
                    'wizard'    => 'Wizard',
                    'team-2'    => '2 Player',
                    'team-3'    => '3 Player',
                    'team-4'    => '4 Player',));

