<?php

class AdminHeaderAddController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Add') {
            if ($this -> request -> valid()) {
                $service = new AdminContentService();
                $model = $service -> insertContent($this -> request, 2, $this -> user_id);

                redirect('/admin/header?action=Success&name='.$model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $this -> response -> setDto(new AdminHeaderAddDto($this -> request));
            }
        } else {
            $this -> response -> setDto(new AdminHeaderAddDto());
        }

    }

}

?>