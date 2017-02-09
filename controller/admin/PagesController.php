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
            if (strpos($_SERVER['HTTP_REFERER'], '/admin/page/add') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is created.');
            } elseif (strpos($_SERVER['HTTP_REFERER'], '/admin/page/edit') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is updated.');
            }
        } elseif ($this -> request -> getAction() == 'Delete') {
            if ($this -> request -> valid()) {
                PageContentDao::deleteByPageId($this -> request -> getId());
                PageDao::delete($this -> request -> getId());
                $this -> response -> addNotification('Delete successful.');
            } else {
                $this -> response -> setError($this -> request -> getErrors());
            }
        }

        $dto_array = array();
        $model_array = PageDao::findAll();
        foreach ($model_array as $model) {
            array_push($dto_array, new AdminPagesDto($model));
        }
        $this -> response -> setDtoArray($dto_array);
    }

}

?>