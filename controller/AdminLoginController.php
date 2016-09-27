<?php

class AdminLoginController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        if ($this -> form -> getAction() == 'logout') {
            authenticate('', '');
            redirect('/admin/login');
        }
        redirectLoginHttps();
        if ($this -> form -> valid()) {
            authenticate($this -> form -> getUsername(), $this -> form -> getPassword());
        }
        if (isAuthenticated()) {
            redirect('/admin/home');
        }
    }

}

?>