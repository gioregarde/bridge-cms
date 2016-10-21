<?php

class PageContentModel extends BaseModel {

    protected $content_id;
    protected $page_id;
    protected $sequence;
    protected $section_num;

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

}

?>