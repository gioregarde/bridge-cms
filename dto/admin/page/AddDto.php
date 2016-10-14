<?php

class AdminPageAddDto extends BaseDto {

    protected $name;
    protected $url;
    protected $content;
    protected $css;
    protected $js;
    protected $controller;

    function __construct($model = null) {
        parent::__construct($model);
    }


    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setUrl($par) {
        $this -> url = $par;
    }

    function getUrl() {
        return $this -> url;
    }

    function setContent($par) {
        $this -> content = $par;
    }

    function getContent() {
        return $this -> content;
    }

    function setCss($par) {
        $this -> css = $par;
    }

    function getCss() {
        return $this -> css;
    }

    function setJs($par) {
        $this -> js = $par;
    }

    function getJs() {
        return $this -> js;
    }

    function setController($par) {
        $this -> controller = $par;
    }

    function getController() {
        return $this -> controller;
    }

}

?>

