<?php

require_once 'inc/functions.inc.php';
require_once 'inc/errors.inc.php';
require_once 'inc/bootstrap.inc.php';
require_once 'inc/credentials.inc.php';
require_once 'inc/settings.inc.php';

//$p = new Controllers\ParagonCalculator();
//$p->generateData('_external/Paragon10000.csv');
//die();

\Controllers\AbstractController::setSettings($settings);
\Mappers\AbstractMapper::setSettings($settings);
\Factories\AbstractFactory::setSettings($settings);

$fc = new \Controllers\FrontController(BASE_DIR);
\Views\View::getInstance()->assign('settings', $settings);
\Views\View::getInstance()->assign('fc', $fc);
\Views\View::getInstance()->display('index.tpl');
