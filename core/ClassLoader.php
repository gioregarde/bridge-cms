<?php

    function __autoload($class_name) {

        $directories = array (
            Properties::get(Properties::PATH_CONTROLLER),
            Properties::get(Properties::PATH_DAO),
            Properties::get(Properties::PATH_DTO),
            Properties::get(Properties::PATH_MODEL),
            Properties::get(Properties::PATH_REQUEST),
            Properties::get(Properties::PATH_RESPONSE),
            Properties::get(Properties::PATH_SERVICE),
            Properties::get(Properties::PATH_UTILS),
            Properties::get(Properties::PATH_CONSTANTS)
        );

        if (strpos($class_name, Properties::get(Properties::FILE_EXT_CONTROLLER)) !== false ||
            strpos($class_name, Properties::get(Properties::FILE_EXT_DTO)) !== false ||
            strpos($class_name, Properties::get(Properties::FILE_EXT_REQUEST)) !== false ||
            strpos($class_name, Properties::get(Properties::FILE_EXT_RESPONSE)) !== false ||
            strpos($class_name, Properties::get(Properties::FILE_EXT_SERVICE)) !== false) {

            $class_name = parseClassPath($class_name);

        }

        foreach ($directories as $directory) {
            if (file_exists($directory.$class_name.Properties::PATH_EXT_PHP)) {
                require_once($directory.$class_name.Properties::PATH_EXT_PHP);
                return;
            }
        }

        throw new Exception('Class not found');

    }

    function parseClassPath($class_name) {
        $path_list = preg_split(Properties::REGEX_CLASS_SPLIT, $class_name);
        array_shift($path_list);
        $absolute_path = '';
        $length = count($path_list);
        foreach ($path_list as $index => $path) {
            $absolute_path .= $path;
            if ($index < $length - 2) {
                $absolute_path .= Properties::PATH_DIV;
            }
        }
        return $absolute_path;
    }

?>