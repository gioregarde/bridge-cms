<?php

class Properties {

    const REGEX_URL = '/^([A-Za-z0-9]+)$/';
    const PATH_DIV = '/';
    const PATH_EXT_PHP = '.php';
    const PATH_EXT_CSS = '.css';
    const PATH_EXT_JS = '.js';

    const DEBUG_LEVEL = 'debug.level';
    const DEBUG_LEVEL_WARN = 0;
    const DEBUG_LEVEL_INFO = 1;
    const DEBUG_LEVEL_DEBUG = 2;
    const DEBUG_LEVEL_ERR = 3;

    const DB_HOST = 'db.host';
    const DB_NAME = 'db.name';
    const DB_USER = 'db.user';
    const DB_PASS = 'db.pass';

    const FILE_EXT_CONTROLLER = 'file.ext.controller';
    const FILE_EXT_FORM = 'file.ext.form';
    const FILE_EXT_DTO = 'file.ext.dto';

    const PATH_CORE = 'path.core';
    const PATH_CONTROLLER = 'path.controller';
    const PATH_DAO = 'path.dao';
    const PATH_DTO = 'path.dto';
    const PATH_MODEL = 'path.model';
    const PATH_FORM = 'path.form';
    const PATH_UTILS = 'path.utils';
    const PATH_CONSTANTS = 'path.constants';
    const PATH_PAGE = 'path.page';
    const PATH_HEADER = 'path.header';
    const PATH_FOOTER = 'path.footer';
    const PATH_MISC = 'path.misc';
    const PATH_CSS = 'path.css';
    const PATH_JS = 'path.js';

    const PROPERTIES_FILE = 'resources/properties.ini';

    public static function get($key) {
        static $properties;
        if (!isset($properties)) {
            $properties = parse_ini_file(self::PROPERTIES_FILE);
        }
        return $properties[$key];
    }

}

?>