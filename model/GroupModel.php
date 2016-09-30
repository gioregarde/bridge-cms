<?php

class GroupModel extends BaseModel {

    private $name;
    private $enabled;
    private $datetime;

    function __construct($par = null) {
        parent::__construct($par);
        if (is_array($par)) {
            $this -> name = $par['name'];
            $this -> enabled = $par['enabled'];
            $this -> datetime = $par['datetime'];
        }
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
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