<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-07
 * Time: 오후 3:05
 */
header('Content-Type: application/json;charset=utf-8;');
include('../php/dbInfo.php');

$sql = 'SELECT * FROM post';

$totalData = $dbconn->query($sql);
$jsonData = $totalData->fetchAll(PDO::FETCH_NAMED);

echo json_encode($jsonData);
