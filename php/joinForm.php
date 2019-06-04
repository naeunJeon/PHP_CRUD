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
        sUrl = "/php/emailCheck.php";
        commonAjax(sEmail, sUrl);
    });

    $('#join').click(function () {
        var data = $("#join_form").form('get values');
        var jsondata = JSON.stringify(data);
        welAjax(jsondata);
    });

    function welAjax(jsondata) {
        var type = "POST";
        var url = "/php/join_proc.php";

        $.ajax({
            url: url,
            data: jsondata,
            type: type,
            datatype: "json",
            contentType: 'application/json',
            timeout: 3000,
            cache: false,
            success: function (result) {
                location.href = '../php/loginForm.php'
            },
            error: function (request, status, error) {
                alert("code = " + request.status + " message = " + request.responseText + " error = " + error);
            }
        });
    }

    function commonAjax(data, sUrl) {
        $.ajax({
            url: sUrl,
            data: {email : data},
            type: "POST",
            timeout: 3000,
            cache: false,
            success: function (result) {
                alert(result);
                //location.href = '../php/loginForm.php'
            },
            error: function (request, status, error) {
                alert("code = " + request.status + " message = " + request.responseText + " error = " + error);
            }
        });
    }


</script>
