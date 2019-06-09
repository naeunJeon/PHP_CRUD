<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-06-04
 * Time: 오후 4:47
 */

include('../php/dbInfo.php');

$sEmail = $_POST['email'];

$stmt = $dbconn->prepare('SELECT idx FROM member_info WHERE email=:email LIMIT 1');
$stmt->bindParam(':email',$sEmail);

$stmt->execute();
if($stmt->fetch(PDO::FETCH_NAMED)==false)
    echo true;
else
    echo false;