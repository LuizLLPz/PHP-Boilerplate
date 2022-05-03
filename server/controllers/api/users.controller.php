<?php
# Controladores de api são diferentes, é necessário criar um array contendo todos os métodos http a serem tratados pela api.
require MODELS . 'User.php';
$methods = [
    'GET' => function($param, $childpattern) {
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
            $result = $user->selectUnique($GLOBALS['qb'], $param);
            $hateoas = [
                '_links' => [
                    'self' => [
                        'href' => 'http://localhost:8000/api/users/'.$result['id'],
                    ],
                    'posts' => [
                        'href' => "http://localhost:8000/api/users/".$result['id']."/posts",
                    ],
                ],
            ];
            $result = array_merge($result, $hateoas);
            echo json_encode($result, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        }
    },
    'POST' => function($param) {

    },
    'DELETE' => function($param) {
        echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    },
];

