<?php

class AdminContentController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Success') {
            if (strpos($_SERVER['HTTP_REFERER'], '/admin/content/add') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is created.');
            } elseif (strpos($_SERVER['HTTP_REFERER'], '/admin/content/edit') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is updated.');
            }
        } elseif ($this -> request -> getAction() == 'Delete') {
            if ($this -> request -> valid()) {
                $service = new AdminContentService();
                if ($service -> deleteContent($this -> request, 1)) {
                    $this -> response -> addNotification('Delete successful.');
                }
            } else {
                $this -> response -> setError($this -> request -> getErrors());
            }
        }

        $dto_array = array();
        $model_array = ContentDao::findAllByContentType(1);
        foreach ($model_array as $model) {
            array_push($dto_array, new AdminContentDto($model));
        }
        $this -> response -> setDtoArray($dto_array);
    }

}

?>