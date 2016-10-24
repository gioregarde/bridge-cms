<?php

class PageUtil {

    const FILENAME_DIV = '_';
    const FILENAME_EXT_PHP = '.php';
    const FILENAME_EXT_CSS = '.css';
    const FILENAME_EXT_JS = '.js';

    const PATH_LAYOUT = 'resources/dynamic/layout/';
    const PATH_LAYOUT_CSS = 'resources/dynamic/layout/css/';
    const PATH_PAGE_VIEW = 'resources/dynamic/page/view/';
    const PATH_PAGE_CSS = 'resources/dynamic/page/css/';
    const PATH_PAGE_JS = 'resources/dynamic/page/js/';
    const PATH_PAGE_CONTROLLER = 'resources/dynamic/page/controller/';

    // layout
    static function writeLayout($filename, $content) {
        self::write(self::PATH_LAYOUT.$filename.self::FILENAME_EXT_PHP, $content);
    }

    static function getLayout($filename) {
        return self::get(self::PATH_LAYOUT.$filename.self::FILENAME_EXT_PHP);
    }

    static function deleteLayout($filename) {
        self::delete(self::PATH_LAYOUT.$filename.self::FILENAME_EXT_PHP);
    }

    // layout Css
    static function writeLayoutCss($filename, $content) {
        self::write(self::PATH_LAYOUT_CSS.$filename.self::FILENAME_EXT_CSS, $content);
    }

    static function getLayoutCss($filename) {
        return self::get(self::PATH_LAYOUT_CSS.$filename.self::FILENAME_EXT_CSS);
    }

    static function deleteLayoutCss($filename) {
        self::delete(self::PATH_LAYOUT_CSS.$filename.self::FILENAME_EXT_CSS);
    }

    // View
    static function writeView($filename, $content) {
        self::write(self::PATH_PAGE_VIEW.$filename.self::FILENAME_EXT_PHP, $content);
    }

    static function getView($filename) {
        return self::get(self::PATH_PAGE_VIEW.$filename.self::FILENAME_EXT_PHP);
    }

    static function deleteView($filename) {
        self::delete(self::PATH_PAGE_VIEW.$filename.self::FILENAME_EXT_PHP);
    }

    // Css
    static function writeCss($filename, $content) {
        self::write(self::PATH_PAGE_CSS.$filename.self::FILENAME_EXT_CSS, $content);
    }

    static function getCss($filename) {
        return self::get(self::PATH_PAGE_CSS.$filename.self::FILENAME_EXT_CSS);
    }

    static function deleteCss($filename) {
        self::delete(self::PATH_PAGE_CSS.$filename.self::FILENAME_EXT_CSS);
    }

    // Js
    static function writeJs($filename, $content) {
        self::write(self::PATH_PAGE_JS.$filename.self::FILENAME_EXT_JS, $content);
    }

    static function getJs($filename) {
        return self::get(self::PATH_PAGE_JS.$filename.self::FILENAME_EXT_JS);
    }

    static function deleteJs($filename) {
        self::delete(self::PATH_PAGE_JS.$filename.self::FILENAME_EXT_JS);
    }

    // Controller
    static function writeController($filename, $content) {
        self::write(self::PATH_PAGE_CONTROLLER.$filename.self::FILENAME_EXT_PHP, $content);
    }

    static function getController($filename) {
        return self::get(self::PATH_PAGE_CONTROLLER.$filename.self::FILENAME_EXT_PHP);
    }

    static function deleteController($filename) {
        self::delete(self::PATH_PAGE_CONTROLLER.$filename.self::FILENAME_EXT_PHP);
    }

    private static function write($filename, $content) {
        console($filename);
        if ($content) {
            return file_put_contents($filename, $content);
        }
    }

    private static function get($filename) {
        if (file_exists($filename)) {
            return file_get_contents($filename);
        }
    }

    private static function delete($filename) {
        if (file_exists($filename)) {
            return unlink($filename);
        }
    }

    static function generateFilename($model) {
        return $model -> getContentTypeId().self::FILENAME_DIV.$model -> getId();
    }

}

?>