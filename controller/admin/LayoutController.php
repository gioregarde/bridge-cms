<?php

class AdminLayoutController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Success') {
            if (strpos($_SERVER['HTTP_REFERER'], '/admin/layout/add') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is created.');
            } elseif (strpos($_SERVER['HTTP_REFERER'], '/admin/layout/edit') !== false) {
                $this -> response -> addNotification($this -> request -> getName().' is updated.');
            }
        } elseif ($this -> request -> getAction() == 'Delete') {
            if ($this -> request -> valid()) {
                if (count(PageContentDao::findAllByContentId($this -> request -> getId())) == 0) {
                    $count = LayoutDao::delete($this -> request -> getId());
                    if ($count > 0) {
                        $this -> response -> addNotification('Delete successful.');
                        foreach ($this -> request -> getId() as $id) {
                            PageUtil::deleteLayout($id);
                            PageUtil::deleteLayoutCss($id);
                        }
                    }
                }
            } else {
                $this -> response -> setError($this -> request -> getErrors());
            }
        }

        $dto_array = array();
        $model_array = LayoutDao::findAll();
        foreach ($model_array as $model) {
            array_push($dto_array, new AdminLayoutDto($model));
        }
        $this -> response -> setDtoArray($dto_array);

    }

}

?>