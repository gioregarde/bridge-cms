<?php

class AdminNavigationController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Success') {
            if (strpos($_SERVER['HTTP_REFERER'], '/admin/navigation/add') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is created.');
            } elseif (strpos($_SERVER['HTTP_REFERER'], '/admin/navigation/edit') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is updated.');
            }
        } elseif ($this -> request -> getAction() == 'Delete') {
            if ($this -> request -> valid()) {
                $service = new AdminContentService();
                if ($service -> deleteContent($this -> request, 3)) {
                    $this -> response -> addNotification('Delete successful.');
                } else {
                    $this -> response -> addError('Delete error');
                }
            } else {
                $this -> response -> setError($this -> request -> getErrors());
            }
        }

        $dto_array = array();
        $model_array = ContentDao::findAllByContentType(3);
        foreach ($model_array as $model) {
            array_push($dto_array, new AdminNavigationDto($model));
        }
        $this -> response -> setDtoArray($dto_array);

    }

}

?>