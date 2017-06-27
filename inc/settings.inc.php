<?php

\Mappers\AbstractMapper::setToken('ym27gyghj5bmsws4xu578vbt');
\Mappers\AbstractMapper::setApiKey('b75sttwvpwh73arvv6848nty26ytprek');

define('DEBUG_MODE', true);

define('BASE_DIR', '/D3T');

define('SMARTY_TPL_DIR', 'tpl/');
define('SMARTY_COMP_DIR', 'tpl_c/');
define('SMARTY_CACHE_DIR', 'cache/');
define('SMARTY_CACHE', false);
define('SMARTY_CACHE_LIFETIME', 60);

define('MAX_PARAGON', 10000);
define('MIN_PARAGON', 0);
define('PARAGON_LIMIT_STEP', 500);

define('THOUSAND', 1000);
define('MILLION', 1000000);
define('BILLION', 1000000000);
define('TRILLION', 1000000000000);


$settings = new \Controllers\Settings();
$settings->addContext('RANKING_DEFAULT_REALM', 'eu')
        ->addContext('RANKING_DEFAULT_SEASON', false)
        ->addContext('RANKING_DEFAULT_HARDCORE', false)
        ->addContext('RANKING_DEFAULT_INDEX', '7')
        ->addContext('RANKING_DEFAULT_CLASS', 'team-4')
        ->addContext('RANKING_DEFAULT_MIN', '1')
        ->addContext('RANKING_DEFAULT_MAX', '1000')
        ->addContext('RANKING_MIN_SEASON_INDEX', '1')
        ->addContext('RANKING_MAX_SEASON_INDEX', '10')
        ->addContext('RANKING_MIN_ERA_INDEX', '1')
        ->addContext('RANKING_MAX_ERA_INDEX', '7')
        ->addContext('BNET_PROFILE_URL', array(
                        'eu' => 'https://eu.battle.net/d3/en/profile/',
                        'us' => 'https://us.battle.net/d3/en/profile/',
                        'kr' => 'https://kr.battle.net/d3/ko/profile/',))
        ->addContext('BNET_REALM_NAME', array(
                        'eu' => 'Europe',
                        'us' => 'America',
                        'kr' => 'Korea',))
        ->addContext('RANKING_TYPE', array(
                        'Era',
                        'Season',))
        ->addContext('RANKING_MODE', array(
                        'Normal',
                        'Hardcore',))
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

