<?php

class SiteDao extends BaseDao {

    static function find() {
        return parent::findAll('SITE', 'SiteModel')[0];
    }

    static function update($site_model) {
        $statement = "UPDATE SITE SET NAME = ?, USER_ID = ?, DATETIME = NOW()";
        parent::update($statement, array($site_model -> getName(), $site_model -> getUserId()));
    }

}

?>