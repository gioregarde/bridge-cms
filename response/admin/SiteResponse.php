<?php

class AdminSiteResponse extends BaseResponse {

    private $name;
    private $layout;

    function __construct($dto = null) {
        parent::__construct($dto);
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setLayout($par) {
        $this -> layout = $par;
    }

    function getLayout() {
        return $this -> layout;
    }

}

?>