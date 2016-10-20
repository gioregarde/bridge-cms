<?php

class UserModel extends BaseModel {

    protected $username;
    protected $password;
    protected $enabled;
    protected $hits;
    protected $datetime;

    function __construct($par = null) {
        parent::__construct($par);
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

    function setEnabled($par) {
        $this -> enabled = $par;
    }

    function getEnabled() {
        return $this -> enabled;
    }

    function setHits($par) {
        $this -> hits = $par;
    }

    function getHits() {
        return $this -> hits;
    }

    function setDatetime($par) {
        $this -> datetime = $par;
    }

    function getDatetime() {
        return $this -> datetime;
    }
}

?>