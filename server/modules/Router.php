<?php
class Router {
    private $controllers = [
        'index' => CONTROLLERS . 'index.controller.php',
    ];

    public function __construct() {
        $this->mapFolder();
    }

    public function mapFolder() {
        $files = array_values(array_diff(scandir(CONTROLLERS), ['.', '..']));
        foreach ($files as $file) {
            if ($file !== 'index.controller.php') {
                $this->controllers[str_replace('.controller.php', '', $file)] = CONTROLLERS . $file;
            }
        }
    }

    static function redirect($url) {
        header('Location: ' . $url);
    }

    public function load_controller($url) {
        $url = explode('/', $url, 2);
        if ($url[1] == '') {
            require $this->controllers['index'];
        } else {
            require $this->controllers[$url[1]];
        }
        
    }

}