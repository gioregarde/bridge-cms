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
                $count = ContentDao::delete($this -> request -> getId());
                if ($count > 0) {
                    $this -> response -> addNotification('Delete successful.');

                    foreach ($this -> request -> getId() as $id) {
                        $model = new ContentModel();
                        $model -> setId($id);
                        $model -> setContentTypeId(1);

                        $filename = PageUtil::generateFilename($model);
                        PageUtil::deleteHtml($filename);
                        PageUtil::deleteCss($filename);
                        PageUtil::deleteJs($filename);
                        PageUtil::deleteController($filename);

                    }
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