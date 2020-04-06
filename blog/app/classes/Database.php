<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 3/25/2020
 * Time: 7:12 PM
 */

namespace App\Classes;
class Database
{
    protected static $connection;

    public static function db_connection(){

        if(is_null(self::$connection)) {
            $hostName = "localhost";
            $userName = "root";
            $password = "";
            $dbName = "oop-2";
            self::$connection = mysqli_connect($hostName, $userName, $password, $dbName);
        }

        return self::$connection;
    }
}