<?php

    if (isset($misc) && $misc && file_exists('resources/dynamic/layout/css/'.$dto -> getLayoutId().'.css')) {
        echo '<link rel="stylesheet" type="text/css" href="'.Properties::PATH_DIV.Properties::getUrlRoot().'resources/dynamic/layout/css/'.$dto -> getLayoutId().'.css">';
    }

    if (!isset($sec)) {
        $sec = 0;
    }
    if (isset($content) && $content) {
        $sec++;
    }

    foreach ($dto_array as $dto_item) {
        if (isset($content) && $content && $dto_item -> getContentTypeId() == '1' && $sec == $dto_item -> getSectionNum()) {
            if (file_exists('resources/dynamic/page/controller/'.PageUtil::generateFilename($dto_item).'.php')) {
                require('resources/dynamic/page/controller/'.PageUtil::generateFilename($dto_item).'.php');
            }
            if (file_exists('resources/dynamic/page/view/'.PageUtil::generateFilename($dto_item).'.php')) {
                require('resources/dynamic/page/view/'.PageUtil::generateFilename($dto_item).'.php');
            }
        } elseif (isset($header) && $header && $dto_item -> getContentTypeId() == '2') {
            if (file_exists('resources/dynamic/page/controller/'.PageUtil::generateFilename($dto_item).'.php')) {
                require('resources/dynamic/page/controller/'.PageUtil::generateFilename($dto_item).'.php');
            }
            if (file_exists('resources/dynamic/page/view/'.PageUtil::generateFilename($dto_item).'.php')) {
                require('resources/dynamic/page/view/'.PageUtil::generateFilename($dto_item).'.php');
            }
        } elseif (isset($navigation) && $navigation && $dto_item -> getContentTypeId() == '3') {
            if (file_exists('resources/dynamic/page/controller/'.PageUtil::generateFilename($dto_item).'.php')) {
                require('resources/dynamic/page/controller/'.PageUtil::generateFilename($dto_item).'.php');
            }
            if (file_exists('resources/dynamic/page/view/'.PageUtil::generateFilename($dto_item).'.php')) {
                require('resources/dynamic/page/view/'.PageUtil::generateFilename($dto_item).'.php');
            }
        } elseif (isset($footer) && $footer && $dto_item -> getContentTypeId() == '4') {
            if (file_exists('resources/dynamic/page/controller/'.PageUtil::generateFilename($dto_item).'.php')) {
                require('resources/dynamic/page/controller/'.PageUtil::generateFilename($dto_item).'.php');
            }
            if (file_exists('resources/dynamic/page/view/'.PageUtil::generateFilename($dto_item).'.php')) {
                require('resources/dynamic/page/view/'.PageUtil::generateFilename($dto_item).'.php');
            }
        } elseif (isset($misc) && $misc) {
            if (file_exists('resources/dynamic/page/css/'.PageUtil::generateFilename($dto_item).'.css')) {
                echo '<link rel="stylesheet" type="text/css" href="'.Properties::PATH_DIV.Properties::getUrlRoot().'resources/dynamic/page/css/'.PageUtil::generateFilename($dto_item).'.css">';
            }
            if (file_exists('resources/dynamic/page/js/'.PageUtil::generateFilename($dto_item).'.js')) {
                echo '<script type="text/javascript" src="'.Properties::PATH_DIV.Properties::getUrlRoot().'resources/dynamic/page/js/'.PageUtil::generateFilename($dto_item).'.js"></script>';
            }
        }
    }

?>