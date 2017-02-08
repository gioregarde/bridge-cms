<?php

class AdminPageAddRequest extends BaseRequest {

    protected $name;
    protected $url;
    protected $homepage = 0;
    protected $content = array();
    protected $section = array();
    protected $header = null;
    protected $navigation = null;
    protected $footer = null;
    protected $layoutId = null;

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

    function setHomepage($par) {
        $this -> homepage = $par;
    }

    function getHomepage() {
        return $this -> homepage;
    }

    function setContent($par) {
        $this -> content = $par;
    }

    function getContent() {
        return $this -> content;
    }

    function setSection($par) {
        $this -> section = $par;
    }

    function getSection() {
        return $this -> section;
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

    function setLayoutId($par) {
        $this -> layoutId = $par;
    }

    function getLayoutId() {
        return $this -> layoutId;
    }

    function valid() {
        parent::addError(ErrorUtil::isRequired('Name', $this -> name));
        parent::addError(ErrorUtil::isRequired('Url', $this -> url));
        parent::addError(ErrorUtil::isRequired('Layout', $this -> layoutId));
       return !parent::hasErrors();
    }

}

?>