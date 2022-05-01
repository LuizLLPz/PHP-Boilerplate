<?php
#This file define paths used among the project and return a object to use on database Connection
#This file on production projects should be listed in .gitignore
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
define('MODELS', 'server/models/');
define('CONTROLLERS', './server/controllers/');
define('PAGES', './client/templates/pages/');
define('COMPONENTS', './client/templates/components/');
define('ASSETS', './client/assets/');
define('STYLES', './client/assets/css/');
define('SCRIPTS', './client/assets/js/');
define('IMAGES', './client/assets/img/');
return $db_settings = [
    'host' => 'localhost',
    'db' => 'test',
    'user' => 'root',
    'password' => ''
];
