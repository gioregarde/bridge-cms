<?php

class PageUtil {

    const PATH_DYNAMIC_HTML = 'resources/dynamic/html/';
    const PATH_DYNAMIC_CSS = 'resources/dynamic/css/';
    const PATH_DYNAMIC_JS = 'resources/dynamic/js/';
    const PATH_DYNAMIC_CONTROLLER = 'resources/dynamic/controller/';

    static function writeHTML($filename, $content) {
        file_put_contents(PATH_DYNAMIC_HTML.$filename, $content);
    }

    static function getHTML($filename, $content) {
         file_get_contents(PATH_DYNAMIC_HTML.$filename);
    }

    static function writeCSS($filename, $content) {
        file_put_contents(PATH_DYNAMIC_CSS.$filename, $content);
    }

    static function getCSS($filename, $content) {
        return file_get_contents(PATH_DYNAMIC_CSS.$filename);
    }

    static function writeJS($filename, $content) {
        file_put_contents(PATH_DYNAMIC_JS.$filename, $content);
    }

    static function getJS($filename, $content) {
        return file_get_contents(PATH_DYNAMIC_JS.$filename);
    }

    static function writeController($filename, $content) {
        file_put_contents(PATH_DYNAMIC_CONTROLLER.$filename, $content);
    }

    static function getController($filename, $content) {
        return file_get_contents(PATH_DYNAMIC_CONTROLLER.$filename);
    }

}

?>