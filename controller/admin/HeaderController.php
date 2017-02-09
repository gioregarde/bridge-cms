<?php

class AdminHeaderController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Success') {
            if (strpos($_SERVER['HTTP_REFERER'], '/admin/header/add') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is created.');
            } elseif (strpos($_SERVER['HTTP_REFERER'], '/admin/header/edit') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is updated.');
            }
        } elseif ($this -> request -> getAction() == 'Delete') {
            if ($this -> request -> valid()) {
                $service = new AdminContentService();
                if ($service -> deleteContent($this -> request, 2)) {
                    $this -> response -> addNotification('Delete successful.');
                } else {
                    $this -> response -> addError('Delete error');
                }
            } else {
                $this -> response -> setError($this -> request -> getErrors());
            }
        }

        $dto_array = array();
        $model_array = ContentDao::findAllByContentType(2);
        foreach ($model_array as $model) {
            array_push($dto_array, new AdminHeaderDto($model));
        }
        $this -> response -> setDtoArray($dto_array);

    }

}

?>