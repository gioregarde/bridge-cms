<?php

class PageContentModel extends BaseModel {

    protected $content_id;
    protected $page_id;

    function __construct($par = null) {
        parent::__construct($par);
    }

    function setContentId($par) {
        $this -> content_id = $par;
    }

    function getContentId() {
        return $this -> content_id;
    }

    function setPageId($par) {
        $this -> page_id = $par;
    }

    function getPageId() {
        return $this -> page_id;
    }

}

?>