<?php

class AdminLayoutEditDto extends BaseDto {

    protected $id;
    protected $name;
    protected $css;
    protected $layout;

    function __construct($model = null) {
        parent::__construct($model);
    }

    function setId($par) {
        $this -> id = $par;
    }

    function getId() {
        return $this -> id;
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setCss($par) {
        $this -> css = $par;
    }

    function getCss() {
        return $this -> css;
    }

    function setLayout($par) {
        $this -> layout = $par;
    }

    function getLayout() {
        return $this -> layout;
    }

}

?>