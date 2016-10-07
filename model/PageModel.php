<?php

class PageModel extends BaseModel {

    private $page_type_id;
    private $name;
    private $url;
    private $enabled;
    private $datetime;

    function __construct($par = null) {
        parent::__construct($par);
        if (is_array($par)) {
            $this -> page_type_id = $par['page_type_id'];
            $this -> name = $par['name'];
            $this -> url = $par['url'];
            $this -> enabled = $par['enabled'];
            $this -> datetime = $par['datetime'];
        }
    }

    function setPageTypeId($par) {
        $this -> page_type_id = $par;
    }

    function getPageTypeId() {
        return $this -> page_type_id;
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

    function setEnabled($par) {
        $this -> enabled = $par;
    }

    function getEnabled() {
        return $this -> enabled;
    }

    function setDatetime($par) {
        $this -> datetime = $par;
    }

    function getDatetime() {
        return $this -> datetime;
    }

}

?>