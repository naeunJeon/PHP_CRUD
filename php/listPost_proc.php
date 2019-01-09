<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-07
 * Time: 오후 3:05
 */

include('../php/dbInfo.php');

$sql = 'SELECT * FROM post';
$jsonData = null;
$totalData = $dbconn->query($sql);

foreach ($totalData as $item) {
    $jsonData[] = array(
        "idx" => $item["idx"],
        "title" => $item["title"],
        "contents" => $item["contents"]
    );
}

echo json_encode($jsonData);
