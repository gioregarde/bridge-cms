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
                $page_model -> setUserId($this -> user_id);
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

                $array_content_tmp = $this -> request -> getContent();
                foreach ($array_content_tmp as $index => $content) {
                    if ($content == null || $content == "") {
                        array_splice($array_content_tmp, $index, 1);
                    }
                }
                $this -> request -> setContent($array_content_tmp);

                if (count($this -> request -> getContent()) > count($this -> request -> getContentOld())) {
                    foreach ($this -> request -> getContent() as $index => $content) {
                        $page_content_model -> setContentId($content);
                        $page_content_model -> setSequence($index);
                        $page_content_model -> setSectionNum($this -> request -> getSection()[$index]);
                        if ($index < count($this -> request -> getContentOld())) {
                            PageContentDao::update($page_content_model, $this -> request -> getContentOld()[$index]);
                        } else {
                            PageContentDao::insert($page_content_model);
                        }
                    }
                } elseif (count($this -> request -> getContent()) < count($this -> request -> getContentOld())) {
                    foreach ($this -> request -> getContentOld() as $index => $content) {
                        $page_content_model -> setContentId($this -> request -> getContent()[$index]);
                        $page_content_model -> setSequence($index);
                        $page_content_model -> setSectionNum($this -> request -> getSection()[$index]);
                        if ($index < count($this -> request -> getContent())) {
                            PageContentDao::update($page_content_model, $this -> request -> getContentOld()[$index]);
                        } else {
                            $page_content_model -> setContentId($content);
                            PageContentDao::delete($page_content_model);
                        }
                    }
                } else {
                    foreach ($this -> request -> getContent() as $index => $content) {
                        $page_content_model -> setContentId($content);
                        $page_content_model -> setSequence($index);
                        $page_content_model -> setSectionNum($this -> request -> getSection()[$index]);
                        PageContentDao::update($page_content_model, $this -> request -> getContentOld()[$index]);
                    }
                }

                redirect('/admin/pages?action=Success&name='.$page_model -> getName());
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $dto = new AdminPageEditDto($this -> request);

                $page_content_array = PageContentDao::findByPageId($this -> request -> getId());
            }
        } else {
            $model = PageDao::findById($this -> request -> getId());
            $dto = new AdminPageEditDto($model);

            $page_content_array = PageContentDao::findByPageId($this -> request -> getId());
        }

        if ($page_content_array) {
            $array_content = array();
            $array_sention = array();
            foreach ($page_content_array as $page_content_model) {
                array_push($content_id_array, $page_content_model -> getContentId());
                if ($page_content_model -> getSequence() != null) {
                    array_push($array_content, $page_content_model -> getContentId());
                    array_push($array_sention, $page_content_model -> getSectionNum());
                }
            }
            $dto -> setContent($array_content);
            $dto -> setSection($array_sention);
            $dto -> setContentOld($array_content);
        }

        $array = array();
        $model_array = ContentDao::findAllByContentType(1);
        foreach ($model_array as $model) {
            array_push($array, array('id' => $model -> getId(), 'name' => $model -> getName()));
        }
        $dto -> setContentArray($array);

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