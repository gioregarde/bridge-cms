<?php

class BaseController {

    protected $layout;
    protected $view;
    protected $css;
    protected $js;
    protected $request;
    protected $response;

    function __construct($path = null) {
        if ($path != null) {
            $request_name = join($path).Properties::get(Properties::FILE_EXT_REQUEST);
            $response_name = join($path).Properties::get(Properties::FILE_EXT_RESPONSE);
            $this -> request = new $request_name();
            $this -> response = new $response_name();
            $this -> view = Properties::get(Properties::PATH_PAGE).strtolower(join(Properties::PATH_DIV, $path).Properties::PATH_EXT_PHP);
            $this -> css = Properties::get(Properties::PATH_CSS).strtolower(join(Properties::PATH_DIV, $path).Properties::PATH_EXT_CSS);
            $this -> js = Properties::get(Properties::PATH_JS).strtolower(join(Properties::PATH_DIV, $path).Properties::PATH_EXT_JS);
        } else {
            $this -> request = new BaseRequest();
            $this -> response = new BaseResponse();
            $this -> view = 'page/index.php';
            $this -> css = '';
            $this -> js = '';
        }
        $this -> layout = 'default.php';
    }

    function action() {
        // common logic
    }

    function render() {
        $this -> action();
        $response = $this -> response;
        $dto = $this -> response -> getDto();
        $dto_array = $this -> response -> getDtoArray();
        require_once('page/layout/base.php');
    }

}

?>