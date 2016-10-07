<?php

class AdminPagesController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        $page_model_array = PageDao::findAllByPageType(1);

    }

}

?>