<?php

namespace models;

use components\Db;

class Category
{

    /**
     * @param $category_id
     * @return mixed
     */
    public static function getCategoryId($category_id){
        $db = Db::getConnection();
        $result = $db->prepare('SELECT measurement_name, measured,category_name FROM category WHERE category_id='. $category_id);
        $result->execute();
        $categoryData = $result->fetch();
        return $categoryData;

    }

}