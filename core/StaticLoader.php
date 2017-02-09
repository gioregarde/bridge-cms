<?php 

    $path = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1, strlen(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $path = urldecode(str_replace(Properties::getUrlRoot(), '', $path));
    if ((strpos($path, Properties::get(Properties::PATH_CSS)) !== false ||
        strpos($path, Properties::get(Properties::PATH_DYNAMIC_LAYOUT_CSS)) !== false ||
        strpos($path, Properties::get(Properties::PATH_DYNAMIC_PAGE_CSS)) !== false) &&
        file_exists($path)) {

        header('Content-type: text/css');
        echo file_get_contents($path);
        exit;

    } else if ((strpos($path, Properties::get(Properties::PATH_JS)) !== false ||
        strpos($path, Properties::get(Properties::PATH_DYNAMIC_PAGE_JS)) !== false) && 
        file_exists($path)) {

        header('Content-type: application/javascript');
        echo file_get_contents($path);
        exit;

    } else if (strpos($path, Properties::get(Properties::PATH_DYNAMIC_FILE)) !== false && file_exists($path)) {
        header('Content-type: '.mime_content_type($path));
        echo file_get_contents($path);
        exit;
    }

?>