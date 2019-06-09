<?php
/**
 * Created by PhpStorm.
 * User: 전나은
 * Date: 2019-06-03
 * Time: 오전 10:54
 */
include('../index.php');
include('../php/dbInfo.php');
?>
<div class="main ui container">
    <form class="ui form" id="join_form" method="post">
        <div class="field">
            <label>Name</label>
            <input type="text" name="name" placeholder="NAME">
        </div>
        <div class="field">
            <label>E-mail</label>
            <div class="fields">
            <div class="twelve wide field">
                <input type="email" name="email" placeholder="E-MAIL">
            </div>
            <div class="four wide field">
                <button id="duplicCheck" class="ui button" type="button">중복확인</button>
            </div>
            </div>
            <label id="email_check_txt"></label>
        </div>
        <div class="field">
            <label'>Password</label>
            <input type="password" name="pw" placeholder="PASSWORD">
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" class="hidden">
                <label>I agree to the Terms and Conditions</label>
            </div>
        </div>
        <button id="join" class="ui button" type="submit">가입하기</button>

    </form>
</div>

<script>
    var email_check = false;
    $('#duplicCheck').click(function () {
        $('#email_check_txt').html('') ;
        var sEmail = $('input[name=email]').val();
        var sUrl = "/php/emailCheck.php";
        var oData = {email:sEmail};
        postAjax(oData, sUrl, function (result) {
            if(result==true){
                $('#email_check_txt').append('사용가능한 아이디입니다') ;
                email_check = true;
            }else{
                $('#email_check_txt').append('이미존재하는 아이디입니다') ;
            }
        });
    });

    $('#join').click(function () {
        if(email_check==true){
            var data = $("#join_form").form('get values');
            var jsondata = JSON.stringify(data);
            var sUrl = "/php/join_proc.php";
            postAjax(jsondata, sUrl, (fSuccess) => {location.href = '/php/loginForm.php'});
        } else{
            alert("중복체크를 하지않거나 중복아이디 쓰심");
        }
    });
</script>
<script src="/resource/js/commonAjax.js"></script>