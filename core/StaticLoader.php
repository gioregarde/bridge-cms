<?php 

    $path = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1, strlen(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));;
    if (strpos($path, Properties::get(Properties::PATH_CSS)) !== false && file_exists($path) == 1) {
        header('Content-type: text/css');
        echo file_get_contents($path);
        exit;
    } else if (strpos($path, Properties::get(Properties::PATH_JS)) !== false && file_exists($path) == 1) {
        header('Content-type: application/javascript');
        echo file_get_contents($path);
        exit;
    }

?>