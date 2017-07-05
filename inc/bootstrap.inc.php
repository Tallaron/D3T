<?php
ini_set('default_charset', 'utf-8');

session_start();

require_once 'vendor/autoload.php';

register_shutdown_function('shutdown'); 
