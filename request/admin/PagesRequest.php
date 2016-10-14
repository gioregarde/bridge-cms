<?php

class AdminPagesRequest extends BaseRequest {

    protected $name;

    function __construct() {
        parent::__construct();
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

}

?>