var viewMembers = {
    openEditMemberModal : function () {
        $("#memberHeader").html("Edit Member");
        $("#memberModal").modal('show');
    },
    openAddSpouseModal : function(){
        $("#spouseHeader").html('Add Spouse Details');
        $("#spouseModal").modal('show');
    },
    openEditSpouseModal : function () {
        $("#spouseHeader").html('Edit Spouse Details');
        $("#spouseModal").modal('show');
    },
    openAddResidenceModal : function(){
        $("#residenceHeader").html('Add Residence Details');
        $("#residenceModal").modal('show');
    },
    openEditResidenceModal : function(){
        $("#residenceHeader").html('Edit Residence Details');
        $("#residenceModal").modal('show');
    },
    openAddClubModal : function(){
        $("#clubHeader").html('Add Club Details');
        $("#clubModal").modal('show');
    },
    openEditClubModal : function(){
        $("#clubHeader").html('Edit Club Details');
        $("#clubModal").modal('show');
    },
    openAddChildModal : function(){
        $("#childHeader").html('Add Child Details');
        $("#childModal").modal('show');
    },
    openEditChildModal : function(){
        $("#childHeader").html('Edit Child Details');
        $("#childModal").modal('show');
    },
    openDeleteModal : function(elem){
        console.log(elem);
        $("#deleteModal").modal("show");
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

});

$(window).load(function () {
    $("#loading").addClass("hidden");

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