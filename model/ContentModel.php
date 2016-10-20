<?php

class ContentModel extends BaseModel {

    protected $content_type_id;
    protected $name;
    protected $enabled;
    protected $datetime;
    protected $user_id;

    function __construct($par = null) {
        parent::__construct($par);
    }

    function setContentTypeId($par) {
        $this -> content_type_id = $par;
    }

    function getContentTypeId() {
        return $this -> content_type_id;
    }

     function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
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