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
                if (strpos($file, '.controller.php') !== false) {
                    $this->controllers[str_replace('.controller.php', '', $file)] = CONTROLLERS . $file;
                }
                if(is_dir(CONTROLLERS.$file)) {
                    $subfiles = array_values(array_diff(scandir(CONTROLLERS . $file), ['.', '..']));
                    foreach ($subfiles as $subfile) {
                        if (strpos($subfile, '.controller.php') !== false) {
                            $this->controllers[$file.'/'.str_replace('.controller.php', '', $subfile)] = CONTROLLERS.$file.'/'.$subfile; 
                        }  
                    }
                }
            }
        }
    }

    static function redirect($url) {
        header('Location: ' . $url);
    }

    public function load_controller($url, $method) {
        $url = explode('/', $url, 2);
        if ($url[1] == '') {
            require $this->controllers['index'];
        } else {
            if (array_key_exists($url[1], $this->controllers)) {
                if (strpos($url[1], 'api') !== false) {
                    header('Content-Type: application/json');
                    require $this->controllers[$url[1]];
                    if (!array_key_exists($method, $methods)){
                        echo json_encode([]);
                    } else {
                        $methods[$method]();
                    }
                } else {
                    require $this->controllers[$url[1]];
                }
            } else {
                echo '<h1>404</h1>';
            } 
        }
        
    }

}