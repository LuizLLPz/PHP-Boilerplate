<?php
#Esse arquivo define caminhos do projeto e retorna um objeto contendo informações para conexão com o banco de dados
#Esse arquivo em projetos de produção deve ser listado no .gitignore
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
