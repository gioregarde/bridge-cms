<?php

class AdminLayoutAddDto extends BaseDto {

    protected $name;
    protected $css;
    protected $layout;

    function __construct($model = null) {
        parent::__construct($model);
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

