<?php

class SiteDao extends BaseDao {

    static function find() {
        return parent::findAllSQL('SITE', 'SiteModel')[0];
    }

    static function update($site_model) {
        $statement = "UPDATE SITE SET NAME = ?, USER_ID = ?, DATETIME = NOW()";
        parent::updateSQL($statement, array($site_model -> getName(), $site_model -> getUserId()));
    }

}

?>