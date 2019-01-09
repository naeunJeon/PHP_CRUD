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
$sql = 'SELECT * FROM post WHERE idx=' . $idx;
$selectedData = $dbconn->query($sql);

$name = "";
$title = "";
$contents = "";

foreach ($selectedData as $item) {
    $name = $item["name"];
    $title = $item["title"];
    $contents = $item["contents"];
}

?>
<div class="main ui container">
    <div class="ui cards">
        <div class="card">
            <div class="content">
                <div class="header">
                    Elliot Fu
                </div>
                <div class="meta">
                    Friends of Veronika
                </div>
                <div class="description">
                    Elliot requested permission to view your contact detailss
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
    $('.header').html("<?= $title?>");
    $(".meta").html("<?= $name?>");
    $(".description").html("<?= $contents?>");

    $('#edit').click(function () {

    });
</script>

