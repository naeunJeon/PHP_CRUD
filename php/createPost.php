<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-03
 * Time: 오후 1:15
 */
include('../index.php');
$value = json_decode(file_get_contents("php://input"), true);
echo json_encode($value);

?>

<div class="main ui container">
    <form class="ui form" id="submit_form">
        <div class="field">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div class="field">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title">
        </div>
        <div class="field">
            <label>Text</label>
            <textarea name="contents"id="contents"></textarea>
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
