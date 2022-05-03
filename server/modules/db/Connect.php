<?php
class Connect {
    static function init($db_settings) {
        
        return new PDO('mysql:host=' . $db_settings['host'] . ';
                        dbname=' . $db_settings['db'],
                        $db_settings['user'], 
                        $db_settings['password'],
                        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
     
    }
}