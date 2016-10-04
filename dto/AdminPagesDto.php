<?php

class AdminPagesDto extends BaseDto {

    function __construct($model = null) {
        ObjectUtil::copy($model, $this);
    }

}

?>

