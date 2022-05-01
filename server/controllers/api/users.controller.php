<?php
# Controladores de api são diferentes, é necessário criar um array contendo todos os métodos http a serem tratados pela api.
require MODELS . 'User.php';
$methods = [
    'GET' => function($param) {

    },
    'POST' => function($param) {
        $output = [
            'errors' => [
                ['title' => 'Title is required',
                'body' => 'Body is required'],
                ['title' => 'Title is required',
                'body' => 'Body is required']
            ],
            'user' => [
                'name' => 'Erlan',
                'age' => '23',
                'email' => 'teste@gmail.com'
            ]
        ];
        echo json_encode($output);
    },
    'DELETE' => function($param) {
        #Show me the url params bro!
        echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    },
];

