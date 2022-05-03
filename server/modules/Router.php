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
        $url = explode('/', $url, 2)[1];
        if ($url == '') {
            require $this->controllers['index'];
        } else {
            if (strpos($url, 'api/') !== false) {
                header('Content-Type: application/json');
                $url = explode ('/', $url);
                $path = $url[0].'/'.$url[1];
                $param = count($url) > 2 ? $url[2] : null;
                $childendpoint = count($url) == 4 ? ["param" => $url[2], "endpoint" => $url[3]] : null;
                if (array_key_exists($path, $this->controllers)) {
                    require $this->controllers[$path];
                    if (array_key_exists($method, $methods)) {
                        $methods[$method]($param, $childendpoint);
                    } else {
                        echo var_dump(parse_url($_SERVER['REQUEST_URI']));
                        echo "Method not found!";
                    }
                    $methods = null;

                } else {
                    http_response_code(404);
                    echo 'Controller not found';
                }

            } else {
                if (array_key_exists($url, $this->controllers)) {
                    require $this->controllers[$url];
                } else {
                    http_response_code(404);
                    echo '404 - Page not found';
                }
            }
        }
        
    }

}