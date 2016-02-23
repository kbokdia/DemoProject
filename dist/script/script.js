var pageMainScript = {};

$(window).load(function() {

    $("#loading").addClass("hidden");

    $("button, a").click(function(){
        $(this).blur();
    })
});