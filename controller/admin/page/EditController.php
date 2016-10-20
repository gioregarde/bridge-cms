<?php

class AdminPageEditController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        $dto = new AdminPageEditDto();
        $page_content_array;
        $content_id_array = array();

        if ($this -> request -> getAction() == 'Update') {
            if ($this -> request -> valid()) {
                $page_model = new PageModel();
                ObjectUtil::copy($this -> request, $page_model);
                $page_model -> setEnabled(1);
                $page_model -> setUserId(1);
                PageDao::update($page_model);

                $page_content_model = new PageContentModel();
                $page_content_model -> setPageId($page_model -> getId());

                if ($this -> request -> getHeader() && !$this -> request -> getHeaderOld()) {
                    $page_content_model -> setContentId($this -> request -> getHeader());
                    PageContentDao::insert($page_content_model);
                } elseif (!$this -> request -> getHeader() && $this -> request -> getHeaderOld()) {
                    $page_content_model -> setContentId($this -> request -> getHeaderOld());
                    PageContentDao::delete($page_content_model);
                } else {
                    $page_content_model -> setContentId($this -> request -> getHeader());
                    PageContentDao::update($page_content_model, $this -> request -> getHeaderOld());
                }

                if ($this -> request -> getNavigation() && !$this -> request -> getNavigationOld()) {
                    $page_content_model -> setContentId($this -> request -> getNavigation());
                    PageContentDao::insert($page_content_model);
                } elseif (!$this -> request -> getNavigation() && $this -> request -> getNavigationOld()) {
                    $page_content_model -> setContentId($this -> request -> getNavigationOld());
                    PageContentDao::delete($page_content_model);
                } else {
                    $page_content_model -> setContentId($this -> request -> getNavigation());
                    PageContentDao::update($page_content_model, $this -> request -> getNavigationOld());
                }

                if ($this -> request -> getFooter() && !$this -> request -> getFooterOld()) {
                    $page_content_model -> setContentId($this -> request -> getFooter());
                    PageContentDao::insert($page_content_model);
                } elseif (!$this -> request -> getFooter() && $this -> request -> getFooterOld()) {
                    $page_content_model -> setContentId($this -> request -> getFooterOld());
                    PageContentDao::delete($page_content_model);
                } else {
                    $page_content_model -> setContentId($this -> request -> getFooter());
                    PageContentDao::update($page_content_model, $this -> request -> getFooterOld());
                }

                redirect('/admin/pages?action=Success&name='.$page_model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $dto = new AdminPageEditDto($this -> request);
            }
        } else {
            $model = PageDao::findById($this -> request -> getId());
            $dto = new AdminPageEditDto($model);

            $page_content_array = PageContentDao::findByPageId($this -> request -> getId());
        }

        if ($page_content_array) {
            foreach ($page_content_array as $page_content_model) {
                array_push($content_id_array, $page_content_model -> getContentId());
            }
        }

        $array = array();
        $model_array = ContentDao::findAllByContentType(2);
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName()));
            if ($page_content_array && in_array($model -> getId(), $content_id_array)) {
                $dto -> setHeader($model -> getId());
                $dto -> setHeaderOld($model -> getId());
            }
        }
        $dto -> setHeaderArray($array);

        $array = array();
        $model_array = ContentDao::findAllByContentType(4);
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName()));
            if ($page_content_array && in_array($model -> getId(), $content_id_array)) {
                $dto -> setNavigation($model -> getId());
                $dto -> setNavigationOld($model -> getId());
            }
        }
        $dto -> setNavigationArray($array);

        $array = array();
        $model_array = ContentDao::findAllByContentType(3);
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName()));
            if ($page_content_array && in_array($model -> getId(), $content_id_array)) {
                $dto -> setFooter($model -> getId());
                $dto -> setFooterOld($model -> getId());
            }
        }
        $dto -> setFooterArray($array);

        $this -> response -> setDto($dto);

    }

}

?>