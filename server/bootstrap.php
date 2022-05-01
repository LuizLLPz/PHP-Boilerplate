<?php
define ('MODULES', './server/modules/');
require MODULES . 'db/Connect.php';
require MODULES . 'db/QueryBuilder.php';
require MODULES . 'Router.php';
require MODULES . 'App.php';
Connect::init(require './server/config.php');
$r = new Router();
