<?php

class AdminLayoutEditController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Update') {
            if ($this -> request -> valid()) {
                $model = new LayoutModel();
                ObjectUtil::copy($this -> request, $model);
                $model -> setSectionCount(preg_match_all('/class=\".*content.*\"/U', htmlspecialchars_decode($this -> request -> getLayout())));
                $model -> setUserId($this -> user_id);
                LayoutDao::update($model);

                PageUtil::writeLayout($model -> getId(), htmlspecialchars_decode($this -> request -> getLayout()));
                PageUtil::writeLayoutCss($model -> getId(), htmlspecialchars_decode($this -> request -> getCss()));

                redirect('/admin/layout?action=Success&name='.$model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $this -> response -> setDto(new AdminLayoutEditDto($this -> request));
            }
        } else {
            $model = LayoutDao::findById($this -> request -> getId());
            $dto = new AdminLayoutEditDto($model);
            $dto -> setCss(htmlspecialchars(PageUtil::getLayoutCss($model -> getId())));
            $dto -> setLayout(htmlspecialchars(PageUtil::getLayout($model -> getId())));
            $this -> response -> setDto($dto);
        }

    }

}

?>