<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-06-04
 * Time: 오후 4:47
 */

include('../php/dbInfo.php');

$sEmail = $_POST['email'];

$stmt = $dbconn->query("SELECT count(*) FROM member_info WHERE email='".$sEmail."'");
$user = $stmt->fetchColumn();
echo $user;
