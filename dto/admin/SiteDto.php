<?php

class AdminSiteDto extends BaseDto {

    private $name;
    private $layout;

    function __construct($model = null) {
        parent::__construct($model);
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