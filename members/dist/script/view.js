var viewMembers = {
    openMemberModal : function (elem) {

    },
    openDeleteModal : function(elem){
        console.log(elem);
        $("#deleteModal").modal("show");
    },
    openLoginDetailsModal : function(){
        $("#loginModal").modal("show");
    }
};

$(document).ready(function () {

});

$(window).load(function () {
    $("#loading").addClass("hidden");


    //Show Password on button click
    $(".showPassword").click(function(){
        var elem = $(this).closest(".input-group").find("input"),
            inputType = elem.prop("type");

        if(inputType == "password") { elem.prop("type","text"); }
        else{ elem.prop("type","password"); }
    });
});