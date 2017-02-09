<?php

class BaseModel {

    protected $id;

    function __construct($par = null) {
        if (is_array($par)) {
            foreach ($par as $key => $param ) {
                $this -> $key = $param;
            }
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