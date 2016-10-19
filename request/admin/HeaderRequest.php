<?php

class AdminHeaderRequest extends BaseRequest {

    protected $name;
    protected $page_id;

    function __construct() {
        parent::__construct();
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setPageId($par) {
        $this -> page_id = $par;
    }

    function getPageId() {
        return $this -> page_id;
    }

    function valid() {
        if (!$this -> page_id) {
            parent::addError('Please select one to delete');
        }
        return !parent::hasErrors();
    }

}

?>