<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-04
 * Time: 오후 4:45
 */

include('../php/dbInfo.php');

$value = json_decode(file_get_contents("php://input"), true);

//$sql = "INSERT INTO post (name, title, contents) VALUES  ('{$value["name"]}', '{$value["title"]}', '{$value["contents"]}');";
//$dbconn->query($sql);

/* Prepared Statements in PDO */
$stmt = $dbconn->prepare("INSERT INTO POST (name, title, contents) VALUES (:name, :title, :contents)");
$stmt->bindParam(':name',$value["name"]);
$stmt->bindParam(':title',$value["title"]);
$stmt->bindParam(':contents', $value["contents"]);

$stmt->execute();



