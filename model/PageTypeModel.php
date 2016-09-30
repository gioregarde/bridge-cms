<?php

class PageTypeModel extends BaseModel {

    private $name;

    function __construct($par = null) {
        parent::__construct($par);
        if (is_array($par)) {
            $this -> name = $par['name'];

        }
    }

    function setName($par) {
        $this -> name = $par;
    }

    function getName() {
        return $this -> name;
    }

}

?>