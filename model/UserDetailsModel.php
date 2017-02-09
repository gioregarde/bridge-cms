<?php

class UserDetailsModel extends BaseModel {

    protected $user_id;
    protected $firstname;
    protected $lastname;

    function __construct($par = null) {
        parent::__construct($par);
    }

    function setUserId($par) {
        $this -> user_id = $par;
    }

    function getUserId() {
        return $this -> user_id;
    }

    function setFirstname($par) {
        $this -> firstname = $par;
    }

    function getFirstname() {
        return $this -> firstname;
    }

    function setLastname($par) {
        $this -> lastname = $par;
    }

    function getLastname() {
        return $this -> lastname;
    }

}

?>