<?php

class BaseController {

    protected $layout;
    protected $view;
    protected $css;
    protected $js;
    protected $form;
    protected $dto;

    function __construct($path = null) {
        if ($path != null) {
            $form_name = join($path).Properties::get(Properties::FILE_EXT_FORM);
            $dto_name = join($path).Properties::get(Properties::FILE_EXT_DTO);
            $this -> form = new $form_name();
            $this -> dto = new $dto_name();
            $this -> view = Properties::get(Properties::PATH_PAGE).strtolower(join(Properties::PATH_DIV, $path).Properties::PATH_EXT_PHP);
            $this -> css = Properties::get(Properties::PATH_CSS).strtolower(join(Properties::PATH_DIV, $path).Properties::PATH_EXT_CSS);
            $this -> js = Properties::get(Properties::PATH_JS).strtolower(join(Properties::PATH_DIV, $path).Properties::PATH_EXT_JS);
        } else {
            $this -> form = new BaseForm();
            $this -> dto = new BaseDto();
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
        $dto = $this -> dto;
        require_once('page/layout/base.php');
    }

}

?>