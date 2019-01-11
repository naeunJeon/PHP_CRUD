<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-11
 * Time: 오전 11:42
 */



include('../php/dbInfo.php');

$value = json_decode(file_get_contents("php://input"), true);
var_dump($value["idx"]);

/* Prepared Statements in PDO */
$stmt = $dbconn->prepare("UPDATE post SET title=:title, contents=:contents WHERE idx=:idx");
$stmt->bindParam(':title',$value["title"]);
$stmt->bindParam(':contents', $value["contents"]);
$stmt->bindParam(':idx', $value["idx"]);

$stmt->execute();
