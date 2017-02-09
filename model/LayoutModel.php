<?php

class LayoutModel extends BaseModel {

    protected $name;
    protected $section_count;
    protected $datetime;
    protected $user_id;

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

}

?>