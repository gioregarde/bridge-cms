<?php

class LayoutDao extends BaseDao {

    static function findAll() {
        return parent::findAllSQL('LAYOUT', 'LayoutModel');
    }

    static function findById($id) {
        $statement = "SELECT * FROM LAYOUT WHERE ID = ?";
        return new LayoutModel(parent::selectOneSQL($statement, array($id)));
    }

    static function insert($model) {
        $statement = "INSERT LAYOUT (NAME, SECTION_COUNT, USER_ID) VALUES (?, ?, ?)";
        $model -> setId(parent::insertSQL($statement, array($model -> getName(), $model -> getSectionCount(), $model -> getUserId())));
    }

    static function update($model) {
        $statement = "UPDATE LAYOUT SET NAME = ?, SECTION_COUNT = ?, USER_ID = ? WHERE ID = ?";
        return parent::updateSQL($statement, array($model -> getName(), $model -> getSectionCount(), $model -> getUserId(), $model -> getId()));
    }

    static function delete($id_array) {
        $statement = "DELETE FROM LAYOUT WHERE ID IN (".implode(',', array_fill(0, count($id_array), '?')).')';
         return parent::deleteSQL($statement, $id_array);
    }

}

?>