<?php

class AdminContentAddController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Add') {
            if ($this -> request -> valid()) {
                $model = new ContentModel();
                ObjectUtil::copy($this -> request, $model);
                $model -> setContentTypeId(1);
                $model -> setEnabled(1);
                $model -> setUserId(1);
                ContentDao::insert($model);

                $filename = PageUtil::generateFilename($model);
                PageUtil::writeView($filename, htmlspecialchars_decode($this -> request -> getContent()));
                PageUtil::writeCss($filename, htmlspecialchars_decode($this -> request -> getCss()));
                PageUtil::writeJs($filename, htmlspecialchars_decode($this -> request -> getJs()));
                PageUtil::writeController($filename, htmlspecialchars_decode($this -> request -> getController()));

                redirect('/admin/content?action=Success&name='.$model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $dto = new AdminContentAddDto($this -> request);
            }
        } else {
            $this -> response -> setDto(new AdminContentAddDto());
        }

    }

}

?>