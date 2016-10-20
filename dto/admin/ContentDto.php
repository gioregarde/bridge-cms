<?php

class AdminContentDto extends BaseDto {

    protected $content_type_id;
    protected $name;
    protected $enabled;
    protected $datetime;

    function __construct($model = null) {
        parent::__construct($model);
    }

    function setContetTypeId($par) {
        $this -> content_type_id = $par;
    }

    function getContetTypeId() {
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

}

?>

