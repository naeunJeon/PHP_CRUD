function postAjax(oData, sUrl, fSuccess) {
    $.ajax({
        url: sUrl,
        data: oData,
        type: "POST",
        datatype: "json",
        timeout: 1000,
        cache: false,
        success: fSuccess,
        error: function (request, status, error) {
            alert("code = " + request.status + " message = " + request.responseText + " error = " + error);
        }
    });
}