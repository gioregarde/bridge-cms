<?php

class AdminSiteRequest extends BaseRequest {

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
        parent::addError(ErrorUtil::isRequired('Name', $this -> name));
        return !parent::hasErrors();
    }

}

?>