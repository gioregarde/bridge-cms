<?php 

    require_once('Properties.php');
    require_once('init/Init.php');

    // load core files
    foreach (scandir(__DIR__.Properties::PATH_DIV.Properties::get(Properties::PATH_CORE)) as $file) {
        if (strpos($file,Properties::PATH_EXT_PHP) !== false) {
            require_once(Properties::get(Properties::PATH_CORE).Properties::PATH_DIV.$file);
        }
    }

    try {
        $path = explode(Properties::PATH_DIV, ucwords(strtolower(Properties::getRoot(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))), Properties::PATH_DIV));
        $controller_name = join($path).Properties::get(Properties::FILE_EXT_CONTROLLER);
        if (!preg_match(Properties::REGEX_URL, $controller_name)) {
            throw new Exception();
        }
        $controller = new $controller_name($path);
    } catch (Exception $e) {
        error($e);
        $controller = new BaseController();
    }

    $controller -> render();

?>