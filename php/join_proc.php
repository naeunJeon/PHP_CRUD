<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-06-03
 * Time: 오후 1:54
 */

include('../php/dbInfo.php');

$value = json_decode(file_get_contents("php://input"), true);

//$sql = "INSERT INTO post (name, title, contents) VALUES  ('{$value["name"]}', '{$value["title"]}', '{$value["contents"]}');";
//$dbconn->query($sql);

/* Prepared Statements in PDO */
$stmt = $dbconn->prepare("INSERT INTO member_info (name, email, pw) VALUES (:name, :email, :pw)");
$stmt->bindParam(':name',$value["name"]);
$stmt->bindParam(':email',$value["email"]);
$stmt->bindParam(':pw', $value["pw"]);

$stmt->execute();