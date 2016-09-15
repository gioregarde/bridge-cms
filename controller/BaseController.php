<?php

class BaseController {

    protected $layout;
    protected $view;
    protected $form;

    function __construct() {
        $this -> form = new BaseForm();
        $this -> view = 'page/index.php';
        $this -> layout = 'default.php';
    }

    function action() {
        // common logic
    }

    function render() {
        $this -> action();
        $form = $this -> form;
        $layout = $this -> layout;
        $view = $this -> view;
        require_once('page/layout/base.php');
    }

}

?>