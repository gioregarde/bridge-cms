<?php

class AdminPageEditDto extends BaseDto {

    protected $id;
    protected $name;
    protected $url;
    protected $content;
    protected $css;
    protected $js;
    protected $controller;
    protected $header;
    protected $navigation;
    protected $footer;

    protected $headerOld = null;
    protected $navigationOld = null;
    protected $footerOld = null;

    protected $header_array;
    protected $navigation_array;
    protected $footer_array;

    function __construct($model = null) {
        parent::__construct($model);
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

    function setHeaderArray($par) {
        $this -> header_array = $par;
    }

    function getHeaderArray() {
        return $this -> header_array;
    }

    function setNavigationArray($par) {
        $this -> navigation_array = $par;
    }

    function getNavigationArray() {
        return $this -> navigation_array;
    }

    function setFooterArray($par) {
        $this -> footer_array = $par;
    }

    function getFooterArray() {
        return $this -> footer_array;
    }

}

?>