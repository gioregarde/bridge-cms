<?php

class AdminFileController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        $dir_path = Properties::get(Properties::PATH_DYNAMIC_FILE).substr($this -> request -> getPath(), 1);
        if ($this -> request -> getPath() != null && $this -> request -> getPath() != '') {
            $dir_path = $dir_path.Properties::PATH_DIV;
        }
        echo $dir_path;

        if ($this -> request -> getAction() == 'Upload') {
            move_uploaded_file($this -> request -> getFileUpload()["tmp_name"], $dir_path.$this -> request -> getFileUpload()["name"]);
        } else if ($this -> request -> getAction() == 'CreateFolder') {
            mkdir($dir_path.$this -> request -> getFolder());
        } else if ($this -> request -> getAction() == 'Delete') {
            FileUtil::delete($dir_path.$this -> request -> getFile());
        }

        $dir_dto_array = array();
        $file_dto_array = array();
        $dir  = opendir($dir_path);
        while (false !== ($filename = readdir($dir))) {
            if ($filename == '.' || $filename == '..') {
                continue;
            }
            $dto = new AdminFileDto();
            $dto -> setName($filename);
            $dto -> setType(filetype($dir_path.$filename));
            $dto -> setSize(filesize($dir_path.$filename));
            $dto -> setMimeContentType(mime_content_type($dir_path.$filename));
            if ($dto -> getType() == 'dir') {
                array_push($dir_dto_array, $dto);
            } else {
                array_push($file_dto_array, $dto);
            }
        }
        $this -> response -> setDtoArray(array_merge($dir_dto_array, $file_dto_array));

        $dto = new AdminFileDto();
        $dto -> setPath($this -> request -> getPath());
        $this -> response -> setDto($dto);

    }

}

?>