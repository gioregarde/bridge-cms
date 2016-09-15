<?php 

    require_once('Properties.php');

    // load core files
    foreach (scandir($_SERVER['DOCUMENT_ROOT'].Properties::PATH_DIV.Properties::get(Properties::PATH_CORE)) as $file) {
        if (strpos($file,Properties::PATH_EXT) !== false) {
            require_once(Properties::get(Properties::PATH_CORE).Properties::PATH_DIV.$file);
        }
    }

    try {
        $path = explode(Properties::PATH_DIV, ucwords(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), Properties::PATH_DIV));
        $controller_name = ucwords(join($path)).Properties::get(Properties::FILE_EXT_CONTROLLER);
        if (!preg_match(Properties::REGEX_URL, $controller_name)) {
            throw new Exception();
        }
        $controller = new $controller_name();
    } catch (Exception $e) {
        console($e);
        $controller = new BaseController();
    }

    $controller -> render();

?>