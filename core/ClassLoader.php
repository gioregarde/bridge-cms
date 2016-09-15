<?php

    function __autoload($class_name) {

        $directories = array (
            Properties::get(Properties::PATH_CONTROLLER),
            Properties::get(Properties::PATH_DAO),
            Properties::get(Properties::PATH_MODEL),
            Properties::get(Properties::PATH_FORM),
            Properties::get(Properties::PATH_UTILS),
            Properties::get(Properties::PATH_CONSTANTS)
        );

        foreach ($directories as $directory) {
            if (file_exists($directory.$class_name.Properties::PATH_EXT)) {
                require_once($directory.$class_name.Properties::PATH_EXT);
                return;
            }
        }
        throw new Exception('Class not found');

    }

?>