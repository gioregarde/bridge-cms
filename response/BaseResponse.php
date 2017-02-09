<?php

class BaseResponse {

    protected $dto;
    protected $dto_array;
    protected $notifications = array();
    protected $errors = array();

    function __construct($dto = null) {
        if (is_array($dto)) {
            $this -> dto_array = $par;
        } elseif (is_object($dto)) {
            $this -> dto = $par;
        }
    }

    function setDto($par) {
        $this -> dto = $par;
    }

    function getDto() {
        return $this -> dto;
    }

    function setDtoArray($par) {
        $this -> dto_array = $par;
    }

    function getDtoArray() {
        return $this -> dto_array;
    }

    function addNotification($par) {
        if ($par) {
            array_push($this -> notifications, $par);
        }
    }

    function hasNotifications() {
        return count($this -> notifications) > 0;
    }

    function getNotifications() {
        return $this -> notifications;
    }

    function addError($par) {
        if ($par) {
            array_push($this -> errors, $par);
        }
    }

    function setError($par) {
        $this -> errors = $par;
    }

    function hasErrors() {
        return count($this -> errors) > 0;
    }

    function getErrors() {
        return $this -> errors;
    }

}

?>

