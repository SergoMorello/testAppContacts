$(function() {
    uploadForm();
});

function isset(variable) {
    if(typeof(variable) != "undefined" && variable !== null)
        return true;
    return false;
}

function uploadForm() {
    $("form").on('submit',function(event){

        var obj = $(event.target);
        var buttons = obj.find('div#buttons');
        var progress = obj.find('div.progress');
        var progressBar = progress.find('div.progress-bar');

        var maxSize = Number(obj.attr("maxFileSize"));
        var fileSize = 0;
        

        if (obj.find("div#error_form").length<=0)
            obj.prepend('<div class="alert alert-warning" id="error_form" role="alert"></div>');
        var error_form = obj.find("div#error_form");
        error_form.hide();

        progress.show();
        buttons.hide();
        progressBar.addClass("active");
        event.preventDefault();
        
        var formData = new FormData($(this)[0]);

        function setProgress(e) {
            if (e.lengthComputable) {
                
                var complete = e.loaded / e.total;
                var pcnt = Math.floor(complete*100);
                progressBar.attr('aria-valuenow',pcnt);
                progressBar.width(pcnt+'%');
                progressBar.text(pcnt+"%");
            }
        }

        function setError(errorStr) {
            error_form.show();
            error_form.html(errorStr);

            buttons.show();
            progress.hide();
            progressBar.removeClass("active");
            progressBar.attr('aria-valuenow',0);
            progressBar.width(0+'%');
            progressBar.text(0+"%");

        }
        
        if (obj.has("[type='file']").length) {
            if (isset(obj.find("[type='file']")[0].files[0])) {
                fileSize =  obj.find("[type='file']")[0].files[0].size;
            }else{
                setError("File not select");
                return false;
            }

            if (fileSize>maxSize) {
                setError("File max size "+showSize(maxSize));
                return false;
            }
        }
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", setProgress, false);
                xhr.addEventListener("progress", setProgress, false);
                return xhr;
            },
            url: event.target.action+"?ajax=true",
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (returndata) {
                progressBar.removeClass("active");
                if (isset(returndata.success) && returndata.success==true)
                    window.location = returndata.redirect;
            },
            error: function (error){
                var response = error.responseJSON;
                var errors = response.errors;
                
                var errorStr = '<div><b>Error</b></div>';
                $.each(errors,function(k, v) {
                    errorStr += '<div>'+v.name+' '+v.access+'</div>';
                });
                setError(errorStr);
            }
        });
        
        return false;
    });
}