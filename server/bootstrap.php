<?php
define ('MODULES', './server/modules/');
require MODULES . 'db/Connect.php';
require MODULES . 'db/QueryBuilder.php';
require MODULES . 'Router.php';
require MODULES . 'App.php';
$qb = new QueryBuilder(Connect::init(require './server/config.php'));
$GLOBALS['qb'] = $qb;
$r = new Router();
