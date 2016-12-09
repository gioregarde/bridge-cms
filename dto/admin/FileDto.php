<?php

class AdminFileDto extends BaseDto {

    protected $name;
    protected $type;
    protected $size;
    protected $mime_content_type;
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

    function setMimeContentType($par) {
        $this -> mime_content_type = $par;
    }

    function getMimeContentType() {
        return $this -> mime_content_type;
    }

    function setPath($par) {
        $this -> path = $par;
    }

    function getPath() {
        return $this -> path;
    }

    function getFilePath() {
        return Properties::PATH_DIV.substr(Properties::get(Properties::PATH_DYNAMIC_FILE), 0, strlen(Properties::get(Properties::PATH_DYNAMIC_FILE)) - 1).substr($this -> path, 1);
    }

    function getBackPath() {
        return substr($this -> path, 0, strripos($this -> path, Properties::PATH_DIV));
    }

}

?>