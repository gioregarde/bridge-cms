<?php

class PageUtil {

    const REGEX_URL = '/\//';
    const FILENAME_DIV = '_';
    const FILENAME_EXT = '.brd';

    const PATH_DYNAMIC_HTML = 'resources/dynamic/html/';
    const PATH_DYNAMIC_CSS = 'resources/dynamic/css/';
    const PATH_DYNAMIC_JS = 'resources/dynamic/js/';
    const PATH_DYNAMIC_CONTROLLER = 'resources/dynamic/controller/';

    static function writeHTML($filename, $content) {
        if ($content) {
            file_put_contents(self::PATH_DYNAMIC_HTML.$filename, $content);
        }
    }

    static function getHTML($filename) {
        if (file_exists(self::PATH_DYNAMIC_CONTROLLER.$filename)) {
            file_get_contents(self::PATH_DYNAMIC_HTML.$filename);
        }
    }

    static function writeCSS($filename, $content) {
        if ($content) {
            file_put_contents(self::PATH_DYNAMIC_CSS.$filename, $content);
        }
    }

    static function getCSS($filename) {
        if (file_exists(self::PATH_DYNAMIC_CSS.$filename)) {
            return file_get_contents(self::PATH_DYNAMIC_CSS.$filename);
        }
    }

    static function writeJS($filename, $content) {
        if ($content) {
            file_put_contents(self::PATH_DYNAMIC_JS.$filename, $content);
        }
    }

    static function getJS($filename) {
        if (file_exists(self::PATH_DYNAMIC_JS.$filename)) {
            return file_get_contents(self::PATH_DYNAMIC_JS.$filename);
        }
    }

    static function writeController($filename, $content) {
        if ($content) {
            file_put_contents(self::PATH_DYNAMIC_CONTROLLER.$filename, $content);
        }
    }

    static function getController($filename) {
        if (file_exists(self::PATH_DYNAMIC_CONTROLLER.$filename)) {
            return file_get_contents(self::PATH_DYNAMIC_CONTROLLER.$filename);
        }
    }

    static function generateFilename($page_model) {
        return $page_model -> getPageTypeId().self::FILENAME_DIV.$page_model -> getId().self::FILENAME_DIV.join(preg_split(self::REGEX_URL, $page_model -> getUrl()), self::FILENAME_DIV).self::FILENAME_EXT;
    }

}

?>