$(window).resize(function(){
    calc();
});

function calc(){
    var height = $(window).height() - 70;
    $('#main').css("height", height);
}

calc();