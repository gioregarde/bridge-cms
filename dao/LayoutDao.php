<?php

class LayoutDao extends BaseDao {

    static function findAll() {
        return parent::findAll('LAYOUT', 'LayoutModel');
    }

    static function findById($id) {
        $statement = "SELECT * FROM LAYOUT WHERE ID = ?";
        return new LayoutModel(parent::selectOne($statement, array($id)));
    }

    static function insert($model) {
        $statement = "INSERT LAYOUT (NAME, SECTION_COUNT) VALUES (?, ?)";
        $model -> setId(parent::insert($statement, array($model -> getName(), $model -> getSectionCount())));
    }

    static function update($model) {
        $statement = "UPDATE LAYOUT SET NAME = ?, SECTION_COUNT = ? WHERE ID = ?";
        return parent::update($statement, array($model -> getName(), $model -> getSectionCount(), $model -> getId()));
    }

    static function delete($id_array) {
        $statement = "DELETE FROM LAYOUT WHERE ID IN (".implode(',', array_fill(0, count($id_array), '?')).')';
         return parent::delete($statement, $id_array);
    }

}

?>