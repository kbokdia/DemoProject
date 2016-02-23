var pageMembers = {
    openDeleteModal : function(elem){
        console.log(elem);
        $("#deleteModal").modal("show");
    },
    openLoginDetailsModal : function(){
        $("#loginModal").modal("show");
    }
};

$(document).ready(function () {
    $("#membersTable").DataTable({
        responsive : true,
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 0,1,3,4,5 ] }
        ],
        order: [[ 2, "asc" ]],
        fnRowCallback : function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //debugger;
            var index = iDisplayIndexFull + 1;
            $("td:first", nRow).html(index);
            return nRow;
        }
    });
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