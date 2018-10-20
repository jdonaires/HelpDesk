function ShowMessage(Message, Title, typeMessage) {
    swal(Title, Message, typeMessage);
};


function HelpDeskajaxPostSetProcess(parameterData) {
    $.ajax({
        url: parameterData.url,
        data: parameterData.data,
        type: "POST",
        async: true,
        datatype: "html",
        success: function (data) {
            if (data == "Success") {
                swal({
                    title: parameterData.title,
                    text: "¡Éxito! datos procesados satisfactoriamente.",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                },
                function () {
                    if (parameterData.invokefunction != null)
                        parameterData.invokefunction.call();
                });
            }
            else {
                swal({
                    title: parameterData.title,//(parameterData.isWarning) ? "Advertencia" : "error",
                    text: data,
                    type: (parameterData.isWarning) ? "warning" : "error",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.value) {
                        if (parameterData.invokefunction != null){
                            parameterData.invokefunction.call();
                        }
                    }
                })
            }
        },
        error: function (request, status, error) {
            if (request.status == 500) {
                swal((parameterData.isWarning) ? "Advertencia" : "error", error, (parameterData.isWarning) ? "warning" : "error");
            }
        }
    });
}

