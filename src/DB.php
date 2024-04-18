<?php

namespace App;
use PDO;

class DB
{

    public static function mysql_connector() : PDO
    {
        return new PDO("mysql:host=127.0.0.1;dbname=test", "root", "");
    }

    public static function sqlite_connector() : PDO
    {
        return new PDO("sqlite:test.db");
    }
}