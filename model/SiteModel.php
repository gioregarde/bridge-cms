<?php

class SiteModel extends BaseModel {

    protected $name;
    protected $user_id;
    protected $datetime;

    function __construct($par = null) {
        parent::__construct($par);
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setUserId($par) {
        $this -> user_id = $par;
    }

    function getUserId() {
        return $this -> user_id;
    }

    function setDatetime($par) {
        $this -> datetime = $par;
    }

    function getDatetime() {
        return $this -> datetime;
    }

}

?>