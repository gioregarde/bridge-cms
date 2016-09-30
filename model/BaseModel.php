<?php

class BaseModel {

    protected $id;

    function __construct($par = null) {
        if (is_array($par)) {
            $this -> id = $par['id'];
        }
    }

    function setId($par) {
        $this -> id = $par;
    }

    function getId() {
        return $this -> id;
    }

}

?>