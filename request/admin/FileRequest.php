<?php

class AdminFileRequest extends BaseRequest {

    protected $path;
    protected $folder;
    protected $file_upload;
    protected $file;

    function __construct() {
        parent::__construct();
    }

    function setPath($par) {
        $this -> path = $par;
    }

    function getPath() {
        return $this -> path;
    }

    function setFolder($par) {
        $this -> folder = $par;
    }

    function getFolder() {
        return $this -> folder;
    }

    function setFileUpload($par) {
        $this -> file_upload = $par;
    }

    function getFileUpload() {
        return $this -> file_upload;
    }

    function setFile($par) {
        $this -> file = $par;
    }

    function getFile() {
        return $this -> file;
    }

}

?>