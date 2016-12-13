<?php

class Properties {

    // Looger.php
    const DEBUG_NAME = 'System';
    const DEBUG_LEVEL = 'debug.level';
    const DEBUG_LEVEL_ERR = 0;
    const DEBUG_LEVEL_WARN = 1;
    const DEBUG_LEVEL_INFO = 2;
    const DEBUG_LEVEL_DEBUG = 3;

    // DBConnection.php
    const DB_HOST = 'db.host';
    const DB_NAME = 'db.name';
    const DB_USER = 'db.user';
    const DB_PASS = 'db.pass';

    const SESSION_AUTHENTICATED = 'authenticated';
    const SESSION_AUTHENTICATED_USER_ID = 'authenticated_user_id';

    const REGEX_URL = '/^([A-Za-z0-9]+)$/'; // get controller name (URLMapper.php)
    const REGEX_CLASS_SPLIT = '/(?=[A-Z])/'; // get file path from class name (ClassLoader.php)

    const PATH_DIV = '/';
    const PATH_EXT_PHP = '.php';
    const PATH_EXT_CSS = '.css';
    const PATH_EXT_JS = '.js';

    const PATH_CORE = 'path.core';
    const PATH_CONTROLLER = 'path.controller';
    const PATH_DAO = 'path.dao';
    const PATH_DTO = 'path.dto';
    const PATH_MODEL = 'path.model';
    const PATH_REQUEST = 'path.request';
    const PATH_RESPONSE = 'path.response';
    const PATH_SERVICE = 'path.service';
    const PATH_UTILS = 'path.utils';
    const PATH_CONSTANTS = 'path.constants';
    const PATH_PAGE = 'path.page';
    const PATH_HEADER = 'path.header';
    const PATH_FOOTER = 'path.footer';
    const PATH_MISC = 'path.misc';
    const PATH_CSS = 'path.css';
    const PATH_JS = 'path.js';

    const PATH_DYNAMIC_LAYOUT = 'path.dynamic.layout';
    const PATH_DYNAMIC_LAYOUT_CSS = 'path.dynamic.layout.css';
    const PATH_DYNAMIC_PAGE_CONTROLLER = 'path.dynamic.page.controller';
    const PATH_DYNAMIC_PAGE_CSS = 'path.dynamic.page.css';
    const PATH_DYNAMIC_PAGE_JS = 'path.dynamic.page.js';
    const PATH_DYNAMIC_PAGE_VIEW = 'path.dynamic.page.view';
    const PATH_DYNAMIC_FILE = 'path.dynamic.file';

    const FILE_EXT_CONTROLLER = 'file.ext.controller';
    const FILE_EXT_DTO = 'file.ext.dto';
    const FILE_EXT_REQUEST= 'file.ext.request';
    const FILE_EXT_RESPONSE = 'file.ext.response';
    const FILE_EXT_SERVICE = 'file.ext.service';

    const PROPERTIES_FILE = 'resources/properties.ini';

    public static function get($key) {
        static $properties;
        if (!isset($properties)) {
            $properties = parse_ini_file(self::PROPERTIES_FILE);
        }
        return $properties[$key];
    }

    public static function getUrlRoot($isPrefix = false) {
        if ($isPrefix) {
            return self::PATH_DIV.str_replace($_SERVER['DOCUMENT_ROOT'].'/', '', __DIR__);
        } else {
            return str_replace($_SERVER['DOCUMENT_ROOT'].'/', '', __DIR__).self::PATH_DIV;
        }
    }

    public static function getRoot($url) {
        return str_replace(str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__.Properties::PATH_DIV), '', $url);
    }

}

?>