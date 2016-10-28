<?php

class AdminPageAddDto extends BaseDto {

    protected $name;
    protected $url;
    protected $content = array();
    protected $section = array();
    protected $header;
    protected $navigation;
    protected $footer;
    protected $layout;

    protected $content_array;
    protected $header_array;
    protected $navigation_array;
    protected $footer_array;
    protected $layout_array;

    function __construct($model = null) {
        parent::__construct($model);
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

    function setLayout($par) {
        $this -> layout = $par;
    }

    function getLayout() {
        return $this -> layout;
    }

    function setContentArray($par) {
        $this -> content_array = $par;
    }

    function getContentArray() {
        return $this -> content_array;
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

    function setLayoutArray($par) {
        $this -> layout_array = $par;
    }

    function getLayoutArray() {
        return $this -> layout_array;
    }

}

?>

