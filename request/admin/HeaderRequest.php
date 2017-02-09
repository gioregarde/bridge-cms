<?php

class AdminHeaderRequest extends BaseRequest {

    protected $name;
    protected $id;

    function __construct() {
        parent::__construct();
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setId($par) {
        $this -> id = $par;
    }

    function getId() {
        return $this -> id;
    }

    function valid() {
        if (!$this -> id) {
            parent::addError('Please select one to delete');
        }
        return !parent::hasErrors();
    }

}

?>