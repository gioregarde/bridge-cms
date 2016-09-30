<?php

class UserModel extends BaseModel {

    private $username;
    private $password;
    private $enabled;
    private $hits;
    private $datetime;

    function __construct($par = null) {
        parent::__construct($par);
        if (is_array($par)) {
            $this -> username = $par['username'];
            $this -> password = $par['password'];
            $this -> enabled = $par['enabled'];
            $this -> hits = $par['hits'];
            $this -> datetime = $par['datetime'];
        }
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