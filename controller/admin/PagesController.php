<?php

class AdminPagesController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Success') {
            $this -> response -> addNotification($this -> request -> getName().' is created.');
        } elseif ($this -> request -> getAction() == 'Delete') {
            $count = PageDao::delete($this -> request -> getPageId());
            if ($count > 0) {
                $this -> response -> addNotification('Delete successful.');
            }
        }

        $page_dto_array = array();
        $page_model_array = PageDao::findAllByPageType(1);
        foreach ($page_model_array as $page_model) {
            array_push($page_dto_array, new AdminPagesDto($page_model));
        }
        $this -> response -> setDtoArray($page_dto_array);
    }

}

?>