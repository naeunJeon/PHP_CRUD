<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-06-04
 * Time: 오후 4:47
 */

include('../php/dbInfo.php');

$sEmail = $_POST['email'];

$stmt = $dbconn->prepare('SELECT idx FROM member_info WHERE eamil=:email');
$stmt->bindParam(':email',$sEmail);

$stmt->execute();
//$stmt->fetch(PDO::FETCH_NAMED);


//var_dump($stmt);
/*if($stmt->fetch(PDO::FETCH_NAMED)==0)
    $result = true;
else
    $result = false;*/

var_dump($stmt->fetch(PDO::FETCH_NAMED));
