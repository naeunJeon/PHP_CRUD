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
$selectedData = $selectedData->fetchAll(PDO::FETCH_NAMED);

$idx = $selectedData[0]["idx"];
$name = $selectedData[0]["name"];
$title = $selectedData[0]["title"];
$contents = $selectedData[0]["contents"];

$jsondata = json_encode($selectedData);
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
        var data = JSON.stringify(<?=$jsondata?>);
        //console.log(data);
        $.ajax({
            url : "/php/createPost.php",
            type : "POST",
            data : data,
            timeout: 3000,
            cache : false,
            success: function(result) {
                //console.log(result);
                location.href='../php/createPost.php'
            },
            error: function(request,status,error){
                alert("code = "+ request.status + " message = " + request.responseText + " error = " + error);
            }
        });
    });
</script>

