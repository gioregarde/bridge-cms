<?php

class AdminPageAddDto extends BaseDto {

    function __construct($model = null) {
        ObjectUtil::copy($model, $this);
    }

}

?>

