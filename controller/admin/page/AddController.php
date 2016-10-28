<?php

class AdminPageAddController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        $dto = new AdminPageAddDto();

        if ($this -> request -> getAction() == 'Add') {
            if ($this -> request -> valid()) {
                $page_model = new PageModel();
                ObjectUtil::copy($this -> request, $page_model);
                $page_model -> setEnabled(1);
                $page_model -> setUserId(1);
                PageDao::insert($page_model);

                $page_content_model = new PageContentModel();
                $page_content_model -> setPageId($page_model -> getId());

                if ($this -> request -> getHeader()) {
                    $page_content_model -> setContentId($this -> request -> getHeader());
                    PageContentDao::insert($page_content_model);
                }
                if ($this -> request -> getNavigation()) {
                    $page_content_model -> setContentId($this -> request -> getNavigation());
                    PageContentDao::insert($page_content_model);
                }
                if ($this -> request -> getFooter()) {
                    $page_content_model -> setContentId($this -> request -> getFooter());
                    PageContentDao::insert($page_content_model);
                }

                redirect('/admin/pages?action=Success&name='.$page_model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $dto = new AdminPageAddDto($this -> request);
            }
        }

        $array = array();
        $model_array = ContentDao::findAllByContentType(1);
        print_r($model_array);
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName()));
        }
        $dto -> setContentArray($array);

        $array = array();
        $model_array = ContentDao::findAllByContentType(2);
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName()));
        }
        $dto -> setHeaderArray($array);

        $array = array();
        $model_array = ContentDao::findAllByContentType(3);
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName()));
        }
        $dto -> setNavigationArray($array);

        $array = array();
        $model_array = ContentDao::findAllByContentType(4);
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName()));
        }
        $dto -> setFooterArray($array);

        $array = array();
        $model_array = LayoutDao::findAll();
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName(), 'section_count' => $model -> getSectionCount()));
        }
        $dto -> setLayoutArray($array);

        $this -> response -> setDto($dto);

    }

}

?>