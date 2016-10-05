<?php

class AdminSiteForm extends BaseForm {

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

    function valid() {
        return $this -> name != null;
    }
}

?>