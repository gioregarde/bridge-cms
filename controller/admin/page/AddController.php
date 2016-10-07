<?php

class AdminPageAddController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> form -> getAction() == 'Add') {
            if ($this -> form -> valid()) {
                $page_model = new PageModel();
                ObjectUtil::copy($this -> form, $page_model);
                $page_model -> setPageTypeId(1);
                $page_model -> setEnabled(1);
                PageDao::insert($page_model);

                $filename = PageUtil::generateFilename($page_model);
                PageUtil::writeHTML($filename, htmlspecialchars_decode($this -> form -> getContent()));
                PageUtil::writeCSS($filename, htmlspecialchars_decode($this -> form -> getCss()));
                PageUtil::writeJS($filename, htmlspecialchars_decode($this -> form -> getJs()));
                PageUtil::writeController($filename, htmlspecialchars_decode($this -> form -> getController()));

                redirect('/admin/pages');
            } else {
                console('invalid');
            }
        }

    }

}

?>