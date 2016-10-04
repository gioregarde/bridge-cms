<?php

class SiteDao extends BaseDao {

    static function find() {
        $model_array = parent::findAll('SITE', 'SiteModel');
        $site_model = null;
        if (count($model_array) == 1) {
            $site_model = $model_array[0];
        }
        return $site_model;
    }

    static function update($site_model) {
        $statement = "UPDATE SITE SET NAME = ?";
        parent::update($statement, array($site_model -> getName()));
    }

}

?>