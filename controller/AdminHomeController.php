<?php

class AdminHomeController extends BaseController {

    function __construct() {
        parent::__construct();
        $this -> form = new AdminHomeForm();
        $this -> view = 'page/admin/home.php';
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();

    }

}

?>