<?php
class App {

    static function  obj_f($obj) {
        echo '<pre>';
        var_dump($obj);
        echo '</pre>';
    }

    static function apiResponse($obj) {
        header('Content-Type: application/json');
        echo json_encode($obj, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }
}