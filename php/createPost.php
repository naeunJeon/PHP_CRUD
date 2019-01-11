<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-03
 * Time: 오후 1:15
 */
include('../index.php');
include('../php/dbInfo.php');

$flag = true;
$name = "";
$title = "";
$contents = "";

if( isset($_GET['id'])){
    $idx = $_GET['id'];
    $sql = 'SELECT * FROM post WHERE idx=' .$idx;
    $selectedData = $dbconn->query($sql);
    $selectedData = $selectedData->fetchAll(PDO::FETCH_NAMED);

    $name = $selectedData[0]["name"];
    $title = $selectedData[0]["title"];
    $contents = $selectedData[0]["contents"];
}

?>

<div class="main ui container">
    <form class="ui form" id="submit_form">
        <div class="field">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="<?=$name?>">
        </div>
        <div class="field">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="<?=$title?>">
        </div>
        <div class="field">
            <label>Text</label>
            <textarea name="contents"id="contents"><?=$contents?></textarea>
        </div>
    </form>
    <br>
    <button class="ui button" type =submit id="save">SAVE</button>
</div>


<script>

$('#save').click(function () {
    var data = $("#submit_form").form('get values');
    var jsondata = JSON.stringify(data);
    console.log(jsondata);
    $.ajax({
        url : "/php/createPost_proc.php",
        data : jsondata,
        type : "POST",
        datatype : "json",
        contentType: 'application/json',
        timeout : 3000,
        cache : false,
        success: function(result) {
            console.log(result);
        },
        error: function(request,status,error){
            alert("code = "+ request.status + " message = " + request.responseText + " error = " + error);
        }
    });
});
</script>
