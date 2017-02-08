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
        $content = str_replace('<bridge-misc/>', '<?php $misc = 1; require(\'page/layout/page.php\'); $misc = 0;?>', $content);
        $content = str_replace('<bridge-header/>', '<?php $header = 1; require(\'page/layout/page.php\'); $header = 0;?>', $content);
        $content = str_replace('<bridge-nav/>', '<?php $navigation = 1; require(\'page/layout/page.php\'); $navigation = 0;?>', $content);
        $content = str_replace('<bridge-content/>', '<div class="content"><?php $content = 1; require(\'page/layout/page.php\'); $content = 0;?></div>', $content);
        $content = str_replace('<bridge-footer/>', '<?php $footer = 1; require(\'page/layout/page.php\'); $footer = 0;?>', $content);
        self::write(self::PATH_LAYOUT.$filename.self::FILENAME_EXT_PHP, $content);
    }

    static function getLayout($filename) {
        $content = self::get(self::PATH_LAYOUT.$filename.self::FILENAME_EXT_PHP);
        $content = str_replace('<?php $misc = 1; require(\'page/layout/page.php\'); $misc = 0;?>', '<bridge-misc/>', $content);
        $content = str_replace('<?php $header = 1; require(\'page/layout/page.php\'); $header = 0;?>', '<bridge-header/>', $content);
        $content = str_replace('<?php $navigation = 1; require(\'page/layout/page.php\'); $navigation = 0;?>', '<bridge-nav/>', $content);
        $content = str_replace('<div class="content"><?php $content = 1; require(\'page/layout/page.php\'); $content = 0;?></div>', '<bridge-content/>', $content);
        $content = str_replace('<?php $footer = 1; require(\'page/layout/page.php\'); $footer = 0;?>', '<bridge-footer/>', $content);
        return $content;
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