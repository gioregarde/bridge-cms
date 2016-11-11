<?php

    openlog(Properties::DEBUG_NAME, LOG_PERROR, LOG_SYSLOG);
    register_shutdown_function('closelog');

    function error($data) {
        if (Properties::DEBUG_LEVEL_ERR <= Properties::get(Properties::DEBUG_LEVEL)) {
            syslog(LOG_ERR, $data);
        }
    }

    function warning($data) {
        if (Properties::DEBUG_LEVEL_WARN <= Properties::get(Properties::DEBUG_LEVEL)) {
            syslog(LOG_WARNING, $data);
        }
    }

    function info($data) {
        if (Properties::DEBUG_LEVEL_INFO <= Properties::get(Properties::DEBUG_LEVEL)) {
            syslog(LOG_INFO, $data);
        }
    }

    function debug($data) {
        if (Properties::DEBUG_LEVEL_DEBUG <= Properties::get(Properties::DEBUG_LEVEL)) {
            syslog(LOG_DEBUG, $data);
        }
    }

?>
