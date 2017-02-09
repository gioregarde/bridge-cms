<?php

class AdminFooterEditController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        $service = new AdminContentService();
        if ($this -> request -> getAction() == 'Update') {
            if ($this -> request -> valid()) {
                $model = $service -> updateContent($this -> request, 4, $this -> user_id);

                redirect('/admin/footer?action=Success&name='.$model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $this -> response -> setDto(new AdminFooterEditDto($this -> request));
            }
        } else {
            $this -> response -> setDto($service -> getContent($this -> request -> getId(), 'AdminFooterEditDto'));
        }

    }

}

?>