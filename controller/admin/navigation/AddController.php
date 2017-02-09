<?php

class AdminNavigationAddController extends BaseController {

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
                $model = $service -> insertContent($this -> request, 3, $this -> user_id);

                redirect('/admin/navigation?action=Success&name='.$model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $this -> response -> setDto(new AdminNavigationAddDto($this -> request));
            }
        } else {
            $this -> response -> setDto(new AdminNavigationAddDto());
        }

    }

}

?>