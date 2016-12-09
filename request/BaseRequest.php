<?php

class BaseRequest {

    protected $action;
    protected $errors = array();

    function __construct() {
        foreach ($_REQUEST as $key => $param ) {
            if (is_array($param)) {
                $param_array = array();
                foreach ($param as $param_inner ) {
                    array_push($param_array, htmlspecialchars($param_inner));
                }
                $this -> $key = $param_array;
            } else {
                if ($param) {
                    $this -> $key = htmlspecialchars($param);
                }
            }
        }
        foreach ($_FILES as $key => $param ) {
            $this -> $key = $param;
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

    protected function addError($par) {
        if ($par) {
            array_push($this -> errors, $par);
        }
    }

    protected function hasErrors() {
        return count($this -> errors) > 0;
    }

    function getErrors() {
        return $this -> errors;
    }

    function valid() {
        // common validation
    }

}

?>