<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-03
 * Time: 오후 2:38
 */

require_once('../index.php');

?>

<div class="main ui container">
    <div class>
    <button type="button" class = "ui basic button" onclick="location.href='../php/createPost.php'">글쓰기</button>
    <br>
    <div class="column" id="view-data">
        <!-- 데이터 -->
    </div>
</div>

<script>
    loadData();

    /* 게시글 읽어옴 */
    function loadData(){
        $.ajax({
            url : "/php/listPost_proc.php",
            type : "GET",
            timeout: 3000,
            cache : false,
            success: function(result) {
                createDataList(result);
            },
            error: function(request,status,error){
                alert("code = "+ request.status + " message = " + request.responseText + " error = " + error);
            }
        });
    }

    function createDataList(result) {
        for(var i=0; i<result.length; i++) {
            //console.log(dataObj[i].idx);
            $('#view-data').append('<div class=\"ui fluid vertical menu\">\n' +
                '    <a class="item" id="post_num'+ i + '" + href="../php/readPost.php?id='+result[i].idx+'">\n' +
                '        <h1 class="ui medium header">'+result[i].title+'</h1>\n' +
                '        <p>'+result[i].contents+'</p>\n' +
                '    </a>\n' +
                '</div>' ) ;
        }
    }
</script>
