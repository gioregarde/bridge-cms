<?php

class AdminLayoutAddController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Add') {
            if ($this -> request -> valid()) {
                $model = new LayoutModel();
                ObjectUtil::copy($this -> request, $model);
                $model -> setSectionCount(0);

                $this -> response -> setDto(new AdminLayoutAddDto($this -> request));
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $this -> response -> setDto(new AdminLayoutAddDto($this -> request));
            }
        } else {
            $this -> response -> setDto(new AdminLayoutAddDto());
        }

    }

}

?>