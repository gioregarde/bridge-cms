<?php

class AdminFileDto extends BaseDto {

    protected $name;
    protected $type;
    protected $size;
    protected $path;

    function __construct($model = null) {
        parent::__construct($model);
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setType($par) {
        $this -> type = $par;
    }

    function getType() {
        return $this -> type;
    }

    function setSize($par) {
        $this -> size = $par;
    }

    function getSize() {
        return $this -> size;
    }

    function setPath($par) {
        $this -> path = $par;
    }

    function getPath() {
        return $this -> path;
    }

    function getBackPath() {
        return substr($this -> path, 0, strripos($this -> path, Properties::PATH_DIV));
    }

}

?>