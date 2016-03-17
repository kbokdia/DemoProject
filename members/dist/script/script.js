var pageMembers = {
    openDeleteModal : function(elem){
        console.log(elem);
        $("#deleteModal").modal("show");
    },
    openLoginDetailsModal : function(){
        $("#loginModal").modal("show");
    },
    openAddMemberModal : function(){
        $("#memberForm").find('input').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $("#memberForm").find('select').each(function(){
            $(this).val('1').removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $("#dateOfMarriage").addClass("hidden-xs-up");

        $("#memberModal").modal('show');
    },
    maritalStatusDivChange : function(elem){

        var maritalStatus = $(elem).val();

        switch (maritalStatus)
        {
            case "1" : {
                $("#dateOfMarriage").addClass("hidden-xs-up");
                break;
            }
            case "2" : {
                $("#dateOfMarriage").removeClass("hidden-xs-up");
                break;
            }
            case "3" : {
                $("#dateOfMarriage").removeClass("hidden-xs-up");
                break;
            }
        }
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

    $('#memberDOB').datepicker({
        format: "dd/mm/yyyy",
        weekStart: 0,
        startDate: "01/01/1900",
        endDate: "today",
        startView: 2,
        autoclose: true
    });

    $('#memberDOM').datepicker({
        format: "dd/mm/yyyy",
        weekStart: 0,
        startDate: "01/01/1900",
        startView: 2,
        autoclose: true
    });

});