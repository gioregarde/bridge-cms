<?php

class PageContentModel extends BaseModel {

    protected $page_id;
    protected $sequence;
    protected $section_num;

    protected $content_id;
    protected $content_model;

    function __construct($par = null) {
        parent::__construct($par);
    }

    function setPageId($par) {
        $this -> page_id = $par;
    }

    function getPageId() {
        return $this -> page_id;
    }

    function setSequence($par) {
        $this -> sequence = $par;
    }

    function getSequence() {
        return $this -> sequence;
    }

    function setSectionNum($par) {
        $this -> section_num = $par;
    }

    function getSectionNum() {
        return $this -> section_num;
    }

    function setContentId($par) {
        $this -> content_id = $par;
    }

    function getContentId() {
        return $this -> content_id;
    }

    function setContentModel($par) {
        $this -> content_model = $par;
    }

    function getContentModel() {
        return $this -> content_model;
    }

}

?>