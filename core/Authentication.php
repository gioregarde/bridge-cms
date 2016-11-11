<?php

    session_start();

    function redirect($path) {
        header('Location: '.$path);
        die;
    }

    function isAuthenticated() {
        return !empty($_SESSION[Properties::SESSION_AUTHENTICATED]) && isset($_SESSION[Properties::SESSION_AUTHENTICATED]);
    }

    function authenticateForward() {
        if (!isAuthenticated()) {
            redirect('/admin/login?'.parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY));
        }
    }

    function authenticate($username, $password) {
        $user_model = UserDao::findByUsername($username);
        if ($user_model -> getUsername() && sha1($password) == $user_model -> getPassword()) {
            $_SESSION[Properties::SESSION_AUTHENTICATED] = true;
        } else {
            session_destroy();
        }
    }

    function redirectLoginHttps() {
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
            $redirect = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            header('HTTP/1.1 301 Moved Permanently');
            redirect($redirect);
        }
    }

?>