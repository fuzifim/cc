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
function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}