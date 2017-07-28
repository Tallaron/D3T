<?php

define('DEBUG_MODE', true);
define('IMPORT_ENABLED', true); //false for live systems
define('BASE_DIR', '/D3T'); // '' if live!
define('IS_API', false);
define('DEFAULT_CACHE_DIR', 'cached_data');
define('BUILDS_DATA_BASE_DIR', 'data/builds');

define('TWITCH_DEFAULT_CHANNEL', 'tallaron');

define('SMARTY_TPL_DIR', 'tpl/');
define('SMARTY_COMP_DIR', 'tpl_c/');
define('SMARTY_CACHE_DIR', 'cache/');
define('SMARTY_CACHE', false);
define('SMARTY_CACHE_LIFETIME', 60);

define('SYS_DEFAULT_CACHE_LIFETIME', 3600);
define('SYS_NEWSFEED_CACHE_LIFETIME', 3600);
define('SYS_LADDER_CACHE_LIFETIME', 3600);
define('SYS_PROFILE_CACHE_LIFETIME', 3600*1);
define('SYS_HERO_CACHE_LIFETIME', 3600*1);
define('SYS_ITEM_CACHE_LIFETIME', 3600*1);

define('D3_CURRENT_ERA_EU', 8);
define('D3_CURRENT_ERA_US', 8);
define('D3_CURRENT_ERA_KR', 8);
define('D3_CURRENT_ERA_CN', 6);
define('D3_CURRENT_SEASON_EU', 11);
define('D3_CURRENT_SEASON_US', 11);
define('D3_CURRENT_SEASON_KR', 11);
define('D3_CURRENT_SEASON_CN', 11);

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

define('D3_GAME_GUIDE_ITEM_BASE_URL', 'https://eu.battle.net/d3/en/item/');
define('D3_GAME_GUIDE_SKILL_BASE_URL', 'https://eu.battle.net/d3/en/class/');

define('BLIZZARD_D3_ITEM_BASE_PATH', 'http://media.blizzard.com/d3/icons/items/');
define('BLIZZARD_D3_SKILL_BASE_PATH', 'http://media.blizzard.com/d3/icons/skills/');
define('BLIZZARD_D3_PORTRAIT_BASE_PATH', 'http://media.blizzard.com/d3/icons/portraits/');

define('BLIZZARD_D3_ITEM_API_URL', 'https://%s.api.battle.net/d3/data/item/%s?locale=en_GB');

define('ITEM_API_DEFAULT_REALM', 'eu');
define('EMPTY_ITEM_DEFAULT_NAME', 'EMPTY');
define('EMPTY_ITEM_DEFAULT_DISPLAY_COLOR', 'white');
define('EMPTY_ITEM_DEFAULT_TOOLTIP_PARAMS', '');

define('EMPTY_SKILL_DEFAULT_NAME', 'EMPTY');

define('ACTIVE_SKILL_IMPORT_URL', 'https://eu.battle.net/d3/en/class/%s/active/');

$settings = new \Controllers\Settings();
$settings->addContext('RANKING_DEFAULT_REALM', 'eu')
        ->addContext('RANKING_DEFAULT_SEASON', false)
        ->addContext('RANKING_DEFAULT_HARDCORE', false)
        ->addContext('RANKING_DEFAULT_INDEX', array(
                            'eu' => D3_CURRENT_ERA_EU,
                            'us' => D3_CURRENT_ERA_US,
                            'kr' => D3_CURRENT_ERA_KR,
                            'cn' => D3_CURRENT_ERA_CN,))
        ->addContext('RANKING_DEFAULT_CLASS', 'team-4')
        ->addContext('RANKING_DEFAULT_MIN', '1')
        ->addContext('RANKING_DEFAULT_MAX', '1000')
        ->addContext('RANKING_MIN_SEASON_INDEX', array(
                            'eu' => 1,
                            'us' => 1,
                            'kr' => 1,
                            'cn' => 1,))
        ->addContext('RANKING_MAX_SEASON_INDEX', array(
                            'eu' => 11,
                            'us' => 11,
                            'kr' => 11,
                            'cn' => 11,))
        ->addContext('RANKING_MIN_ERA_INDEX', array(
                            'eu' => 1,
                            'us' => 1,
                            'kr' => 1,
                            'cn' => 1,))
        ->addContext('RANKING_MAX_ERA_INDEX', array(
                            'eu' => 8,
                            'us' => 8,
                            'kr' => 8,
                            'cn' => 6,))
        ->addContext('BNET_REALM_NAME', array(
                        'eu' => 'Europe',
                        'us' => 'America',
                        'kr' => 'Asia',
                        'cn' => 'China',))
        ->addContext('RANKING_TYPE', array(
                        'Era',
                        'Season',))
        ->addContext('RANKING_MODE', array(
                        'Normal',
                        'Hardcore',))
        ->addContext('BLIZZARD_D3_LADDER_API_URL', array(
                        'eu' => 'https://%s.api.battle.net/data/d3/%s/%d/leaderboard/rift-%s%s',
                        'us' => 'https://%s.api.battle.net/data/d3/%s/%d/leaderboard/rift-%s%s',
                        'kr' => 'https://%s.api.battle.net/data/d3/%s/%d/leaderboard/rift-%s%s',
                        'cn' => 'https://api.battlenet.com.%s/data/d3/%s/%d/leaderboard/rift-%s%s',))
        ->addContext('BLIZZARD_D3_PROFILE_API_URL', array(
                        'eu' => 'https://%s.api.battle.net/d3/profile/%s/?locale=en_GB',
                        'us' => 'https://%s.api.battle.net/d3/profile/%s/?locale=en_GB',
                        'kr' => 'https://%s.api.battle.net/d3/profile/%s/?locale=en_GB',
                        'cn' => 'https://api.battlenet.com.%s/d3/profile/%s/?locale=en_GB',))
        ->addContext('BLIZZARD_D3_HERO_API_URL', array(
                        'eu' => 'https://%s.api.battle.net/d3/profile/%s/hero/%d?locale=en_GB',
                        'us' => 'https://%s.api.battle.net/d3/profile/%s/hero/%d?locale=en_GB',
                        'kr' => 'https://%s.api.battle.net/d3/profile/%s/hero/%d?locale=en_GB',
                        'cn' => 'https://api.battlenet.com.%s/d3/profile/%s/hero/%d?locale=en_GB',))
        ->addContext('BLIZZARD_D3_PROFILE_URL', array(
                        'eu' => 'https://eu.battle.net/d3/en/profile/',
                        'us' => 'https://us.battle.net/d3/en/profile/',
                        'kr' => 'https://kr.battle.net/d3/en/profile/',
                        'cn' => 'http://d3.blizzard.cn/profile/',))
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
        ->addContext('BNET_CLASSES_SHORT', array(
                    'barbarian'     => 'Barb.',
                    'crusader'      => 'Crus.',
                    'demon-hunter'  => 'DH',
                    'monk'          => 'Monk',
                    'necromancer'   => 'Nec.',
                    'witch-doctor'  => 'WD',
                    'wizard'        => 'Wiz.',))
        ->addContext('BNET_CLASSES_LONG', array(
                    'barbarian'     => 'Barbarian',
                    'crusader'      => 'Crusader',
                    'demon-hunter'  => 'Demon Hunter',
                    'monk'          => 'Monk',
                    'necromancer'   => 'Necromancer',
                    'witch-doctor'  => 'Witch Doctor',
                    'wizard'        => 'Wizard',))
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
                    'offHand',))
        ->addContext('RANKING_DEFAULT_MIN_PARAGON', 1)
        ->addContext('RANKING_DEFAULT_MAX_PARAGON', 10000)
        ->addContext('D3_GEMS', array(
            array(
                'name' => 'no-socket',
                'type' => 'all',
            ),
            array(
                'name' => 'empty',
                'type' => 'all',
            ),
            array(
                'name' => 'flawless-royal-amethyst',
                'type' => 'all',
            ),
            array(
                'name' => 'flawless-royal-diamond',
                'type' => 'all',
            ),
            array(
                'name' => 'flawless-royal-emerald',
                'type' => 'all',
            ),
            array(
                'name' => 'flawless-royal-ruby',
                'type' => 'all',
            ),
            array(
                'name' => 'flawless-royal-topaz',
                'type' => 'all',
            ),
            array(
                'name' => 'bane-of-the-powerful',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'bane-of-the-stricken',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'bane-of-the-trapped',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'boon-of-the-hoarder',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'boyarskys-chip',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'enforcer',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'esoteric-alteration',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'gem-of-ease',
                'type' => 'weapon',
            ),
            array(
                'name' => 'gem-of-efficacious-toxin',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'gogok-of-swiftness',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'iceblink',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'invigorating-gemstone',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'mirinae-teardrop-of-the-starweaver',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'molten-wildebeests-gizzard',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'moratorium',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'mutilation-guard',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'pain-enhancer',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'red-soul-shard',
                'type' => 'helm',
            ),
            array(
                'name' => 'simplicitys-strength',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'taeguk',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'wreath-of-lightning',
                'type' => 'jewelry',
            ),
            array(
                'name' => 'zeis-stone-of-vengeance',
                'type' => 'jewelry',
            ),
        ));


