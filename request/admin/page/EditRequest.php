<?php

class AdminPageEditRequest extends BaseRequest {

    protected $id;
    protected $name;
    protected $url;
    protected $content = array();
    protected $section = array();
    protected $header = null;
    protected $navigation = null;
    protected $footer = null;
    protected $layoutId = null;

    protected $contentOld = array();
    protected $headerOld = null;
    protected $navigationOld = null;
    protected $footerOld = null;

    function __construct() {
        parent::__construct();
    }

    function setId($par) {
        $this -> id = $par;
    }

    function getId() {
        return $this -> id;
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

    function setContentOld($par) {
        $this -> contentOld = $par;
    }

    function getContentOld() {
        return $this -> contentOld;
    }

    function setHeaderOld($par) {
        $this -> headerOld = $par;
    }

    function getHeaderOld() {
        return $this -> headerOld;
    }

    function setNavigationOld($par) {
        $this -> navigationOld = $par;
    }

    function getNavigationOld() {
        return $this -> navigationOld;
    }

    function setFooterOld($par) {
        $this -> footerOld = $par;
    }

    function getFooterOld() {
        return $this -> footerOld;
    }

    function valid() {
        parent::addError(ErrorUtil::isRequired('Name', $this -> name));
        parent::addError(ErrorUtil::isRequired('Url', $this -> url));
       return !parent::hasErrors();
    }

}

?>