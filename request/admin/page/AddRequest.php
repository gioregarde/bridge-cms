<?php

class AdminPageAddRequest extends BaseRequest {

    protected $name;
    protected $url;
    protected $header = null;
    protected $navigation = null;
    protected $footer = null;

    function __construct() {
        parent::__construct();
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

    function setHeader($par) {
        $this -> header = $par;
    }

    function getHeader() {
        return $this -> header;
    }

    function setNavigation($par) {
        $this -> navigation = $par;
    }

    function getNavigation() {
        return $this -> navigation;
    }

    function setFooter($par) {
        $this -> footer = $par;
    }

    function getFooter() {
        return $this -> footer;
    }

    function valid() {
        parent::addError(ErrorUtil::isRequired('Name', $this -> name));
        parent::addError(ErrorUtil::isRequired('Url', $this -> url));
       return !parent::hasErrors();
    }

}

?>