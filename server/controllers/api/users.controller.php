<?php
# Controladores de api são diferentes, é necessário criar um array contendo todos os métodos http a serem tratados pela api.
require MODELS . 'User.php';
$methods = [
    'GET' => function($param, $childpattern = null) {
        $user = new User();
        if ($childpattern) {
            if (file_exists(CONTROLLERS.'api/user/'.$childpattern['endpoint'].'.controller.php')) {
                require CONTROLLERS.'api/user/'.$childpattern['endpoint'].'.controller.php';
                $object = get($GLOBALS['qb'], $childpattern['param']);
                echo json_encode($object);
            } else {
                echo "Please implement this very good block of code :)";
            }
        } else {

        }
    },
    'POST' => function($param) {

    },
    'DELETE' => function($param) {
        echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    },
];

