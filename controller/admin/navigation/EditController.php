<?php

class AdminNavigationEditController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Update') {
            if ($this -> request -> valid()) {
                $model = new ContentModel();
                ObjectUtil::copy($this -> request, $model);
                $model -> setContentTypeId(3);
                $model -> setEnabled(1);
                $model -> setUserId(1);
                ContentDao::update($model);

                $filename = PageUtil::generateFilename($model);
                PageUtil::writeHtml($filename, htmlspecialchars_decode($this -> request -> getContent()));
                PageUtil::writeCss($filename, htmlspecialchars_decode($this -> request -> getCss()));
                PageUtil::writeJs($filename, htmlspecialchars_decode($this -> request -> getJs()));
                PageUtil::writeController($filename, htmlspecialchars_decode($this -> request -> getController()));

                redirect('/admin/navigation?action=Success&name='.$model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $this -> response -> setDto(new AdminNavigationEditDto($this -> request));
            }
        } else {
            $model = ContentDao::findById($this -> request -> getId());
            $dto = new AdminNavigationEditDto($model);
            $filename = PageUtil::generateFilename($model);
            $dto -> setContent(htmlspecialchars(PageUtil::getHtml($filename)));
            $dto -> setCss(htmlspecialchars(PageUtil::getCss($filename)));
            $dto -> setJs(htmlspecialchars(PageUtil::getJs($filename)));
            $dto -> setController(htmlspecialchars(PageUtil::getController($filename)));
            $this -> response -> setDto($dto);
        }

    }

}

?>