<?php

    function console($data, $level = Properties::DEBUG_LEVEL_WARN) {
        if ($level <= Properties::get(Properties::DEBUG_LEVEL)) {
            echo '<script>console.log("'.str_replace("\n","",addslashes($data)).'");</script>';
        }
    }

    function warning($data) {
        console($data, $level = Properties::DEBUG_LEVEL_WARN);
    }

    function info($data) {
        console($data, $level = Properties::DEBUG_LEVEL_INFO);
    }

    function debug($data) {
        console($data, $level = Properties::DEBUG_LEVEL_DEBUG);
    }

    function err($data) {
        console($data, $level = Properties::DEBUG_LEVEL_ERR);
    }

?>
