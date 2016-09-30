<?php

class PageModel extends BaseModel {

    private $page_type_id;
    private $group_id;
    private $name;
    private $html;
    private $css;
    private $js;
    private $controller;
    private $file;
    private $enabled;
    private $datetime;

    function __construct($par = null) {
        parent::__construct($par);
        if (is_array($par)) {
            $this -> page_type_id = $par['page_type_id'];
            $this -> group_id = $par['group_id'];
            $this -> name = $par['name'];
            $this -> html = $par['html'];
            $this -> css = $par['css'];
            $this -> js = $par['js'];
            $this -> controller = $par['controller'];
            $this -> file = $par['file'];
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

    function setGroupId($par) {
        $this -> group_id = $par;
    }

    function getGroupId() {
        return $this -> group_id;
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setHtml($par) {
        $this -> html = $par;
    }

    function getHtml() {
        return $this -> html;
    }

    function setCss($par) {
        $this -> css = $par;
    }

    function getCss() {
        return $this -> css;
    }

    function setJs($par) {
        $this -> js = $par;
    }

    function getJs() {
        return $this -> js;
    }

    function setController($par) {
        $this -> controller = $par;
    }

    function getController() {
        return $this -> controller;
    }

    function setFile($par) {
        $this -> file = $par;
    }

    function getFile() {
        return $this -> file;
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