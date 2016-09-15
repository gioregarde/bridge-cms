<?php

    session_start();

    function isAuthenticated() {
        return !empty($_SESSION['authenticated']) && isset($_SESSION['authenticated']);
    }

    function authenticateForward() {
        if (!isAuthenticated()) {
            header('Location: /admin/login?'.parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY));
            die;
        }
    }

    function authenticate($username, $password) {
        $user_model = UserDao::findByUsername($username);
        if ($user_model != null && sha1($password) == sha1($user_model -> getPassword())) {
            $_SESSION['authenticated'] = true;
        } else {
            session_destroy();
        }
    }

    function redirect($path) {
        header('Location: /'.$path);
        die;
    }

?>