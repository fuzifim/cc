$(".addImage").click(function() {
    if($('.imageBoxOption').hasClass("hidden")){
        $('.boxOption').addClass('hidden');
        $('.imageBoxOption').removeClass('hidden');
    }else{
        $('.imageBoxOption').addClass('hidden');
    }
    return false;
});
$(".addVideo").click(function() {
    if($('.videoBoxOption').hasClass("hidden")){
        $('.boxOption').addClass('hidden');
        $('.videoBoxOption').removeClass('hidden');
    }else{
        $('.videoBoxOption').addClass('hidden');
    }
    return false;
});
$("#postMediaPhoto").on("change", function (e) {
    e.preventDefault();
    var files = $("#postMediaPhoto").prop("files");
    var totalFile=files.length;
    if(totalFile>0){
        for(var i=0;i<totalFile;i++)
        {
            uploadSingleFile(file.files[i], i);
        }
    }
});
function uploadSingleFile(file, i) {
    var fileId = i;
    var ajax = new XMLHttpRequest();
    //Progress Listener
    ajax.upload.addEventListener("progress", function (e) {
        var percent = (e.loaded / e.total) * 100;
        $("#status_" + fileId).text(Math.round(percent) + "% uploaded, please wait...");
        $('#progressbar_' + fileId).css("width", percent + "%")
        $("#notify_" + fileId).text("Uploaded " + (e.loaded / 1048576).toFixed(2) + " MB of " + (e.total / 1048576).toFixed(2) + " MB ");
    }, false);
    //Load Listener
    ajax.addEventListener("load", function (e) {
        $("#status_" + fileId).text(event.target.responseText);
        $('#progressbar_' + fileId).css("width", "100%")

        //Hide cancel button
        var _cancel = $('#cancel_' + fileId);
        _cancel.hide();
    }, false);
    //Error Listener
    ajax.addEventListener("error", function (e) {
        $("#status_" + fileId).text("Upload Failed");
    }, false);
    //Abort Listener
    ajax.addEventListener("abort", function (e) {
        $("#status_" + fileId).text("Upload Aborted");
    }, false);

    ajax.open("POST", "/api/upload/UploadFiles"); // Your API .net, php

    var uploaderForm = new FormData(); // Create new FormData
    uploaderForm.append("file", file); // append the next file for upload
    ajax.send(uploaderForm);

    //Cancel button
    var _cancel = $('#cancel_' + fileId);
    _cancel.show();

    _cancel.on('click', function () {
        ajax.abort();
    })
}
function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}