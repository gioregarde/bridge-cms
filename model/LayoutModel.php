<?php

class LayoutModel extends BaseModel {

    protected $name;
    protected $section_count;

    function __construct($par = null) {
        parent::__construct($par);
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setSectionCount($par) {
        $this -> section_count = $par;
    }

    function getSectionCount() {
        return $this -> section_count;
    }

}

?>