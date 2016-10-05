<?php

class BaseForm {

    protected $action;

    function __construct() {
        foreach ($_REQUEST as $key => $param ) {
            $this -> $key = htmlspecialchars($param);
        }
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