<?php

class SiteModel extends BaseModel {

    private $name;
    private $layout;

    function __construct($par = null) {
        if (is_array($par)) {
            $this -> name = $par['name'];
            $this -> layout = $par['layout'];
        }
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