<script>
    function postAjax(data, sUrl) {
    $.ajax({
        url: sUrl,
        data: data,
        type: "POST",
        datatype: "json",
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