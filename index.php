<?php

require_once 'inc/functions.inc.php';
require_once 'inc/errors.inc.php';
require_once 'inc/settings.inc.php';
require_once 'inc/bootstrap.inc.php';


$fc = new \Controllers\FrontController(BASE_DIR);
\Views\View::getInstance()->assign('fc', $fc);
\Views\View::getInstance()->display('index.tpl');






?>


