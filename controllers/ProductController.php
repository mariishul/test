<?php
namespace controllers;

use models\ParamsOfProducts;
use models\Product;

abstract class ProductController
{
    public $name = '';
    public $sku;
    public $price;
    public $category_id;

   public function __construct($post){
        $this->name = $post['name'];
        $this->sku = $post['sku'];
        $this->price = $post['price'];
        $this->category_id = $post['select'];

    }

    abstract public static function formatDescription($data);

    public static function getMainPage(){
       $productList = Product::getProducts();
        require_once ('views/products/index.php');

        return true;
    }

    public static function addProduct(){
        require_once('views/addProduct/index.php');

        return true;
    }


    public static function saveProduct(){
        Product::saveProduct();
        header("Location:http://localhost:8888");

        return true;
    }

    public static function deleteProduct(){
        Product::deleteProduct();
        header("Location:http://localhost:8888");

        return true;
    }

}