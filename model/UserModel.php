<?php

class UserModel extends BaseModel {

    protected $username;
    protected $password;
    protected $datetime;
    protected $user_role_id;

    protected $user_role_model;
    protected $user_details_model;

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

    function setDatetime($par) {
        $this -> datetime = $par;
    }

    function getDatetime() {
        return $this -> datetime;
    }

    function setUserRoleId($par) {
        $this -> user_role_id = $par;
    }

    function getUserRoleId() {
        return $this -> user_role_id;
    }

    function setUserRoleModel($par) {
        $this -> user_role_model = $par;
    }

    function getUserRoleModel() {
        return $this -> user_role_model;
    }

    function setUserDetailsModel($par) {
        $this -> user_details_model = $par;
    }

    function getUserDetailsModel() {
        return $this -> user_details_model;
    }

}

?>