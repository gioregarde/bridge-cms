<?php

class AdminLoginRequest extends BaseRequest {

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
        parent::addError(ErrorUtil::isRequired('Username', $this -> username));
        parent::addError(ErrorUtil::isRequired('Password', $this -> password));
        return !parent::hasErrors();
    }

}

?>