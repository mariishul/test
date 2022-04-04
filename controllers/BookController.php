<?php

namespace controllers;

class BookController extends ProductController
{
    public $weight;

    public function __construct($post){
        parent::__construct($post);
        $this->weight = $post['weight'];
    }

    public static function formatDescription($data){
        return 'Weight: ' . $data['weight'] .' KG';
    }

}