<?php

class BaseModel {

    protected $id;

    function __construct() {
        // for getting number of argument
        console(func_num_args());
        if (func_num_args() >= 1) {
            console(func_num_args(1));
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