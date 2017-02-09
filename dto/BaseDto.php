<?php

class BaseDto {

    protected $id;

    function __construct($model = null) {
        ObjectUtil::copy($model, $this);
    }

    function setId($par) {
        $this -> id = $par;
    }

    function getId() {
        return $this -> id;
    }

}

?>