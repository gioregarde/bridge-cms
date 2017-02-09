<?php

class AdminLoginController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        if ($this -> request -> getAction() == 'logout') {
            authenticate('', '');
            redirect('/admin/login');
        }
        redirectLoginHttps();
        if ($this -> request -> valid()) {
            authenticate($this -> request -> getUsername(), $this -> request -> getPassword());
        }
        if (isAuthenticated()) {
            redirect('/admin/home');
        }
    }

}

?>