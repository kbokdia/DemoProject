var pageEvents = {
    openEventModal : function(){
        $('#eventModal').find('input').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $("#AEHeader").html("Add Event");
        $("#eventModal").modal("show");
    },
    openRSVPModal : function(){
        $("#rsvpModal").modal("show");
    }
};

$(document).ready(function () {
    $('#eventDate').datepicker({
        format: "dd/mm/yyyy",
        startDate: "today",
        todayBtn: true,
        autoclose: true,
        todayHighlight: true
    });

    $("#eventTime").clockpicker({
        autoclose: true
    });
});