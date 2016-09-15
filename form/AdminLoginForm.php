<?php

class AdminLoginForm extends BaseForm {

    private $username;
    private $password;

    function __construct() {
        parent::__construct();
        $this -> username = $this -> getParam('username');
        $this -> password = $this -> getParam('password');
    }

    function setUsername($par) {
        $this -> username = $par;
    }

    function getUsername() {
        return $this -> username;
    }

    function setPassword($par) {
        $this -> password = $par;
    }

    function getPassword() {
        return $this -> password;
    }

    function valid() {
        return $this -> username != null && $this -> password;
    }
}

?>