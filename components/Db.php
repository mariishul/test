<?php

namespace components;

use PDO;

class Db
{
    /**
     * @return \PDO
     */
    public static function getConnection()
    {
        $dbParams = require __DIR__ . '/../config/db_params.php';
        $db = new PDO("mysql:host={$dbParams['server']};port={$dbParams['port']};dbname={$dbParams['DbName']}", $dbParams['user'], $dbParams['password']);
        return $db;

    }

}