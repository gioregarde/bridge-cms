<?php

class PageModel extends BaseModel {

    protected $name;
    protected $url;
    protected $enabled;
    protected $datetime;
    protected $user_id;

    function __construct($par = null) {
        parent::__construct($par);
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setUrl($par) {
        $this -> url = $par;
    }

    function getUrl() {
        return $this -> url;
    }

    function setEnabled($par) {
        $this -> enabled = $par;
    }

    function getEnabled() {
        return $this -> enabled;
    }

    function setDatetime($par) {
        $this -> datetime = $par;
    }

    function getDatetime() {
        return $this -> datetime;
    }

    function setUserId($par) {
        $this -> user_id = $par;
    }

    function getUserId() {
        return $this -> user_id;
    }

}

?>