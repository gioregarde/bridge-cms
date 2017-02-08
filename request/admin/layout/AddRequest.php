<?php

class AdminLayoutAddRequest extends BaseRequest {

    protected $name;
    protected $css;
    protected $layout;

    function __construct() {
        parent::__construct();
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

    function setCss($par) {
        $this -> css = $par;
    }

    function getCss() {
        return $this -> css;
    }

    function setLayout($par) {
        $this -> layout = $par;
    }

    function getLayout() {
        return $this -> layout;
    }

    function valid() {
        parent::addError(ErrorUtil::isRequired('Name', $this -> name));
        parent::addError(ErrorUtil::isRequired('Layout', $this -> layout));
        if (preg_match_all('<bridge-content/>', htmlspecialchars_decode($this -> layout)) == 0) {
            parent::addError('Error in Layout');
        }
        return !parent::hasErrors();
    }

}

?>