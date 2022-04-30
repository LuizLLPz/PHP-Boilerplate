<?php
# Controladores de api são diferentes, é necessário criar um array contendo todos os métodos http a serem tratados pela api!
$methods = [
    'GET' => function() {
        $user_obj = [
            'name' => 'Rafael',
            'age' => '23',
            'email' => 'rafa@hotmail.com'
        ];
        echo json_encode($user_obj);
    },
    'POST' => function() {
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
    }
];

