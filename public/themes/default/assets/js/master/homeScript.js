$(".addImage").click(function() {
    if($('.imageBoxOption').hasClass("hidden")){
        $('.imageBoxOption').removeClass('hidden');
    }else{
        $('.imageBoxOption').addClass('hidden');
    }
    return false;
});