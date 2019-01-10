<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-03
 * Time: 오후 1:23
 */
include('../index.php');
include('../php/dbInfo.php');

$idx = $_GET['id'];
$sql = 'SELECT * FROM post WHERE idx=' .$idx;
$selectedData = $dbconn->query($sql);
$jsonData = $selectedData->fetchAll(PDO::FETCH_NAMED);

$name = $jsonData[0]["name"];
$title = $jsonData[0]["title"];
$contents = $jsonData[0]["contents"];

?>
<div class="main ui container">
    <div class="ui cards">
        <div class="card">
            <div class="content">
                <div class="header">
                    <?= $title?>
                </div>
                <div class="meta">
                    <?= $name?>
                </div>
                <div class="description">
                    <?= $contents?>
                </div>
            </div>
            <div class="extra content">
                <div class="ui two buttons">
                    <div class="ui basic green button" id="edit">수정하기</div>
                    <div class="ui basic red button" onclick="location.href='../php/listPost.php'">목록으로</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#edit').click(function () {

    });
</script>

