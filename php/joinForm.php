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
    <form class="ui form" id="join_form">
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
        </div>
        <div class="field">
            <label>Password</label>
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
    $('#duplicCheck').click(function () {
        var sEmail = $('input[name=email]').val();
        var sUrl = "/php/emailCheck.php";
        var oData = {email:sEmail};
        postAjax(oData, sUrl, (sSuccess) => function (result) {
            alert(result);
        });
    });

    $('#join').click(function () {
        var data = $("#join_form").form('get values');
        var jsondata = JSON.stringify(data);
        var sUrl = "/php/join_proc.php";
        postAjax(jsondata, sUrl, (sSuccess) => {location.href = '/php/loginForm.php'});
    });
</script>
<script src="/resource/js/commonAjax.js"></script>