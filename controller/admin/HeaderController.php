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
                $count = PageDao::delete($this -> request -> getPageId());
                if ($count > 0) {
                    $this -> response -> addNotification('Delete successful.');

                    foreach ($this -> request -> getPageId() as $page_id) {
                        $page_model = new PageModel();
                        $page_model -> setId($page_id);
                        $page_model -> setPageTypeId(2);

                        $filename = PageUtil::generateFilename($page_model);
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
        $page_model_array = PageDao::findAllByPageType(2);
        foreach ($page_model_array as $page_model) {
            array_push($dto_array, new AdminHeaderDto($page_model));
        }
        $this -> response -> setDtoArray($dto_array);

    }

}

?>