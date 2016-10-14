<?php

class ErrorUtil {

    const MESSAGE_IS_REQUIRED = ' is Required.';

    static function isRequired($field, $value) {
        if (!$value) {
            return $field.self::MESSAGE_IS_REQUIRED;
        }
    }

}

?>