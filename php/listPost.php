<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-01-03
 * Time: 오후 2:38
 */

include('../index.php');
include('../php/dbInfo.php');

?>

<div class="main ui container">
    <div class="column">
        <!-- 데이터 -->
    </div>
    <br>
    <button type="button" class = "ui basic button" onclick="location.href='../php/createPost.php'">글쓰기</button>
</div>

<script>
    loadData();
    var dataObj;
    var count = 0;
    const viewitem = $('.column');

    /* 게시글 읽어옴 */
    function loadData(){
        $.ajax({
            url : "/php/listPost_proc.php",
            type : "GET",
            success: function(result) {
                dataObj = JSON.parse(result);
                createDataList(dataObj)
            }
        });
    }

    function createDataList(dataObj) {
        for(var i=0; i<dataObj.length; i++) {
            //console.log(dataObj[i].idx);
            $('.column').append('<div class=\"ui fluid vertical menu\">\n' +
                '    <a class="item" id="post_num'+ i + '" + href="../php/readPost.php?id='+dataObj[i].idx+'">\n' +
                '        <h1 class="ui medium header">'+dataObj[i].title+'</h1>\n' +
                '        <p>'+dataObj[i].contents+'</p>\n' +
                '    </a>\n' +
                '</div>' ) ;
        }
    }
</script>
