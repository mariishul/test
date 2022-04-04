<?php

namespace controllers;

use models\Furniture;

class FurnitureController extends ProductController
{
    public $height;
    public $width;
    public $length;

    public function __construct($post){
        parent::__construct($post);
        $this->height = $post['height'];
        $this->width = $post['width'];
        $this->length = $post['length'];
    }

    public static function formatDescription($data){
        $str = $data['height'] . 'x' . $data['width'] . 'x' . $data['length'];
       return 'Dimensions: '.  $str;
    }
}