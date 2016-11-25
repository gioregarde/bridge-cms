<?php

class PageModel extends BaseModel {

    protected $name;
    protected $url;
    protected $datetime;
    protected $user_id;

    protected $layout_id;
    protected $layout_model;
    protected $page_content_model_list;

    function __construct($par = null) {
        parent::__construct($par);
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setUrl($par) {
        $this -> url = $par;
    }

    function getUrl() {
        return $this -> url;
    }

    function setDatetime($par) {
        $this -> datetime = $par;
    }

    function getDatetime() {
        return $this -> datetime;
    }

    function setUserId($par) {
        $this -> user_id = $par;
    }

    function getUserId() {
        return $this -> user_id;
    }

    function setLayoutId($par) {
        $this -> layout_id = $par;
    }

    function getLayoutId() {
        return $this -> layout_id;
    }

    function setLayoutModel($par) {
        $this -> layout_model = $par;
    }

    function getLayoutModel() {
        return $this -> layout_model;
    }

    function setPageContentModelList($par) {
        $this -> page_content_model_list = $par;
    }

    function getPageContentModelList() {
        return $this -> page_content_model_list;
    }

}

?>