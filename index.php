<?php
require './server/bootstrap.php';
$r->load_controller(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));