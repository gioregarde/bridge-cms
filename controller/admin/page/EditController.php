<?php

class AdminPageEditController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Update') {
            if ($this -> request -> valid()) {
                $page_model = new PageModel();
                ObjectUtil::copy($this -> request, $page_model);
                $page_model -> setPageTypeId(1);
                $page_model -> setEnabled(1);
                PageDao::update($page_model);

                $filename = PageUtil::generateFilename($page_model);
                PageUtil::writeHtml($filename, htmlspecialchars_decode($this -> request -> getContent()));
                PageUtil::writeCss($filename, htmlspecialchars_decode($this -> request -> getCss()));
                PageUtil::writeJs($filename, htmlspecialchars_decode($this -> request -> getJs()));
                PageUtil::writeController($filename, htmlspecialchars_decode($this -> request -> getController()));

                redirect('/admin/pages?action=Success&name='.$page_model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $this -> response -> setDto(new AdminPageEditDto($this -> request));
            }
        } else {
            $page_model = PageDao::findByPageId($this -> request -> getId());
            $page_edit_dto = new AdminPageEditDto($page_model);
            $filename = PageUtil::generateFilename($page_model);
            $page_edit_dto -> setContent(htmlspecialchars(PageUtil::getHtml($filename)));
            $page_edit_dto -> setCss(htmlspecialchars(PageUtil::getCss($filename)));
            $page_edit_dto -> setJs(htmlspecialchars(PageUtil::getJs($filename)));
            $page_edit_dto -> setController(htmlspecialchars(PageUtil::getController($filename)));
            $this -> response -> setDto($page_edit_dto);
        }


    }

}

?>