<?php

class AdminHomeDto extends BaseDto {

    function __construct($model = null) {
        ObjectUtil::copy($model, $this);
    }

}

?>

