<?php

class PageDto extends BaseDto {

    protected $content_type_id;
    protected $layout_id;
    protected $sequence;
    protected $section_num;

    function __construct($model = null) {
        parent::__construct($model);
    }

    function setContentTypeId($par) {
        $this -> content_type_id = $par;
    }

    function getContentTypeId() {
        return $this -> content_type_id;
    }

    function setLayoutId($par) {
        $this -> layout_id = $par;
    }

    function getLayoutId() {
        return $this -> layout_id;
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