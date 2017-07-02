<?php


define('DEBUG_MODE', false);
define('BASE_DIR', '/D3T'); // '' if live!

define('SMARTY_TPL_DIR', 'tpl/');
define('SMARTY_COMP_DIR', 'tpl_c/');
define('SMARTY_CACHE_DIR', 'cache/');
define('SMARTY_CACHE', false);
define('SMARTY_CACHE_LIFETIME', 60);

define('MAX_PARAGON', 10000);
define('MIN_PARAGON', 0);
define('PARAGON_LIMIT_STEP', 500);
define('MIN_LADDER_POSITION', 1);
define('MAX_LADDER_POSITION', 1000);
define('UNKNOWN_PLAYER_DEFAULT_BTAG','~Unknown~#0000');

define('THOUSAND', 1000);
define('MILLION', 1000000);
define('BILLION', 1000000000);
define('TRILLION', 1000000000000);

define('BLIZZARD_D3_ITEM_BASE_PATH', 'http://media.blizzard.com/d3/icons/items/');
define('BLIZZARD_D3_SKILL_BASE_PATH', 'http://media.blizzard.com/d3/icons/skills/');
define('BLIZZARD_D3_PORTRAIT_BASE_PATH', 'http://media.blizzard.com/d3/icons/portraits/');

define('BLIZZARD_D3_HERO_API_URL', 'https://%s.api.battle.net/d3/profile/%s/hero/%d?locale=en_GB');
define('BLIZZARD_D3_ITEM_API_URL', 'https://%s.api.battle.net/d3/data/item/%s?locale=en_GB');
define('BLIZZARD_D3_PROFILE_API_URL', 'https://%s.api.battle.net/d3/profile/%s/?locale=en_GB');
define('BLIZZARD_D3_LADDER_API_URL', 'https://%s.api.battle.net/data/d3/%s/%d/leaderboard/rift-%s%s');

define('ITEM_API_DEFAULT_REALM', 'eu');
define('EMPTY_ITEM_DEFAULT_NAME', 'EMPTY');
define('EMPTY_ITEM_DEFAULT_DISPLAY_COLOR', 'white');
define('EMPTY_ITEM_DEFAULT_TOOLTIP_PARAMS', '');

define('EMPTY_SKILL_DEFAULT_NAME', 'EMPTY');

$settings = new \Controllers\Settings();
$settings->addContext('RANKING_DEFAULT_REALM', 'eu')
        ->addContext('RANKING_DEFAULT_SEASON', false)
        ->addContext('RANKING_DEFAULT_HARDCORE', false)
        ->addContext('RANKING_DEFAULT_INDEX', '8')
        ->addContext('RANKING_DEFAULT_CLASS', 'team-4')
        ->addContext('RANKING_DEFAULT_MIN', '1')
        ->addContext('RANKING_DEFAULT_MAX', '1000')
        ->addContext('RANKING_MIN_SEASON_INDEX', '1')
        ->addContext('RANKING_MAX_SEASON_INDEX', '10')
        ->addContext('RANKING_MIN_ERA_INDEX', '1')
        ->addContext('RANKING_MAX_ERA_INDEX', '8')
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
                    'barbarian'     => 'Barbarian',
                    'crusader'      => 'Crusader',
                    'dh'            => 'Demon Hunter',
                    'monk'          => 'Monk',
                    'necromancer'   => 'Necromancer',
                    'wd'            => 'Witch Doctor',
                    'wizard'        => 'Wizard',
                    'team-2'        => '2 Player',
                    'team-3'        => '3 Player',
                    'team-4'        => '4 Player',))
        ->addContext('ITEM_SLOTS', array(
                    'head' => 'getHead',
                    'torso' => 'getTorso',
                    'waist' => 'getWaist',
                    'legs' => 'getLegs',
                    'feet' => 'getFeet',
                    'shoulders' => 'getShoulders',
                    'hands' => 'getHands',
                    'leftFinger' => 'getLeftFinger',
                    'mainHand' => 'getMainHand',
                    'offHand' => 'getOffHand',
                    'rightFinger' => 'getRightFinger',
                    'bracers' => 'getBracers',
                    'neck' => 'getNeck',))
        ->addContext('SOCKETED_ITEMS', array(
                    'neck',
                    'leftFinger',
                    'rightFinger',
                    'head',
                    'torso',
                    'legs',
                    'mainHand',
                    'offHand',));


