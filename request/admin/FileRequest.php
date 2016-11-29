<?php

class AdminFileRequest extends BaseRequest {

    protected $path;

    function __construct() {
        parent::__construct();
    }

    function setPath($par) {
        $this -> path = $par;
    }

    function getPath() {
        return $this -> path;
    }

}

?>