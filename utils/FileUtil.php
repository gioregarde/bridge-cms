<?php

class FileUtil {

    static function delete($file) {
        if (is_dir($file)) {
            $dir  = opendir($file);
            while (false !== ($inner_file = readdir($dir))) {
                if ($inner_file == '.' || $inner_file == '..') {
                    continue;
                }
                self::delete($file.Properties::PATH_DIV.$inner_file);
            }
            rmdir($file);
        } else {
            unlink($file);
        }
    }

}

?>