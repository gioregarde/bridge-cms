<?php

class AdminFileController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        $dir_path = Properties::get(Properties::PATH_DYNAMIC_FILE).$this -> request -> getPath();

        $dto_array = array();
        $dir  = opendir($dir_path);
        while (false !== ($filename = readdir($dir))) {
            if ($filename == '.' || $filename == '..') {
                continue;
            }
            $dto = new AdminFileDto();
            $dto -> setName($filename);
            $dto -> setType(filetype($dir_path.Properties::PATH_DIV.$filename));
            $dto -> setSize(filesize($dir_path.Properties::PATH_DIV.$filename));
            array_push($dto_array, $dto);
        }
        $this -> response -> setDtoArray($dto_array);

        $dto = new AdminFileDto();
        $dto -> setPath($this -> request -> getPath());
        $this -> response -> setDto($dto);
    }

}

?>