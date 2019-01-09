<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-04
 * Time: 오후 4:55
 */

$host = "localhost";
$port = 5432;
$dbname = "test";
$username = "postgres";
$password = "123qwe111";

class Database extends PDO{
    function __construct() {
        parent::__construct("pgsql:host=localhost;dbname=test","postgres","123qwe```");
    }
}

$dbconn = new Database();