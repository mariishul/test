<?php

namespace models;

use PDO;
use PDOException;
use components\Db;

 class Product
{

    /**
     * @return bool
     */
    public static function saveProduct(){
        $db = Db::getConnection();
        $category = self::getCategoryId($_POST['select'])['category_name'];

        $className = $category . 'Controller';
        $namespaceControllerName = 'controllers\\' . $className;

        $productObject = new $namespaceControllerName($_POST);
        $sql = 'INSERT INTO products (sku, name, category_id, price, size, weight, height, width, length) VALUES(:sku, :name, :category_id, :price, :size, :weight, :height, :width, :length)';

            $result = $db->prepare($sql);
            $result->bindParam(':sku', $productObject->sku);
            $result->bindParam(':name', $productObject->name);
            $result->bindParam(':category_id', $productObject->category_id);
            $result->bindParam(':price', $productObject->price);
            $result->bindParam(':size', $productObject->size);
            $result->bindParam(':weight', $productObject->weight);
            $result->bindParam(':height', $productObject->height);
            $result->bindParam(':width', $productObject->width);
            $result->bindParam(':length', $productObject->length);

           return $result->execute();

    }


    /**
     * @return array
     */
    public static function getProducts(){

        $db = Db::getConnection();
        $productList = [];
        $description = [];
        $result = $db->query('SELECT id, sku, name, price,size, weight,height, width, length, category_id FROM products ORDER BY id ASC');
        $result->execute();

        $i = 0;
        while($row = $result->fetch()) {
            $productList[$i]['sku'] = $row['sku'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $description['size'] = $row['size'];
            $description['weight'] = $row['weight'];
            $description['height'] = $row['height'];
            $description['width'] = $row['width'];
            $description['length'] = $row['length'];


            $category = Category::getCategoryId($row['category_id'])['category_name'];
            $className = $category . 'Controller';
            $namespaceControllerName = 'controllers\\' . $className;

            $productList[$i]['description'] = call_user_func_array([$namespaceControllerName, 'formatDescription'], [$description]);
            $i++;
        }

        return $productList;
    }


    /**
     * @return void
     */
    public static function deleteProduct(){
        $db = Db::getConnection();

        foreach($_POST['sku'] as $key => $value){
            $sql = "DELETE FROM products WHERE sku = :sku";
            $result = $db->prepare($sql);
            $result->bindParam(':sku', $value);

            $result->execute();
        }
    }

}