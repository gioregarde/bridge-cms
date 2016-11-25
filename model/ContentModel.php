<?php

class ContentModel extends BaseModel {

    protected $name;
    protected $datetime;
    protected $user_id;

    protected $content_type_id;
    protected $content_type_model;

    function __construct($par = null) {
        parent::__construct($par);
    }

     function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
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

    function setContentTypeId($par) {
        $this -> content_type_id = $par;
    }

    function getContentTypeId() {
        return $this -> content_type_id;
    }

    function setContentTypeModel($par) {
        $this -> content_type_model = $par;
    }

    function getContentTypeModel() {
        return $this -> content_type_model;
    }

}

?>