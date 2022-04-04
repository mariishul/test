<?php

namespace controllers;

use models\Dvd;

class DvdController extends ProductController
{
    public $size;

    public function __construct($post){
        parent::__construct($post);
        $this->size = $post['size'];
    }

    public static function formatDescription($data){
        return 'Size: ' . $data['size'] . ' MB';
    }

}