function postAjax(data, sUrl, success) {
    alert(success);
    $.ajax({
        url: sUrl,
        data: data,
        type: "POST",
        datatype: "json",
        timeout: 1000,
        cache: false,
        success: success,
        /*success : function(result)
        {
            alert(result);
        },*/
        error: function (request, status, error) {
            alert("code = " + request.status + " message = " + request.responseText + " error = " + error);
        }
    });
}