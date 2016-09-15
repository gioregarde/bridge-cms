<?php

class BaseForm {

    private $action;

    function __construct() {
        $this -> action = $this -> getParam('action');
    }

    protected function getParam($param) {
        return !empty($_REQUEST[$param]) && isset($_REQUEST[$param]) ? $_REQUEST[$param] : '';
    }

    function setAction($par) {
        $this -> action = $par;
    }

    function getAction() {
        return $this -> action;
    }

}

?>