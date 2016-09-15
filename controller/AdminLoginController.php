<?php

class AdminLoginController extends BaseController {

    function __construct() {
        parent::__construct();
        $this -> form = new AdminLoginForm();
        $this -> view = 'page/admin/login.php';
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        if ($this -> form -> getAction() == 'logout') {
            authenticate('', '');
            redirect('admin/login');
        }
        if ($this -> form -> valid()) {
            authenticate($this -> form -> getUsername(), $this -> form -> getPassword());
        }
        if (isAuthenticated()) {
            redirect('admin/home');
        }
    }

}

?>