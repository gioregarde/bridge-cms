<?php

class AdminLoginForm extends BaseForm {

    protected $username;
    protected $password;

    function __construct() {
        parent::__construct();
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