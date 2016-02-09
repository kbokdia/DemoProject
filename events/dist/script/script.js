var pageEvents = {
    data : null,
    baseURL : "controller.php",
    showSuccessNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    showWarningNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    showfailureNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-danger alert-dismissible' id='alertMsgDiv' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    openAddEventModal : function(){
        $('#eventModal').find('input').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $('#eventModal').find('select').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $('#eventModal').find('textarea').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $("#AEHeader").html("Add Event");
        $("#eventModal").modal("show");
    },
    openRSVPModal : function(){
        $("#rsvpModal").modal("show");
    },
    openEditEventModal : function (eventId) {
        var editEventId = eventId;
        $('#eventModal').find('input').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $('#eventModal').find('select').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $('#eventModal').find('textarea').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $("#AEHeader").html("Edit Event");

        console.log(pageEvents.data.status);
        if(pageEvents.data.status == 1)
        {
            for(var i = 0; i < pageEvents.data.result.length ; i ++)
            {
                console.log(editEventId);
                if(parseInt(editEventId) === parseInt(pageEvents.data.result[i].EventId))
                {
                    $("#eventName").val(pageEvents.data.result[i].Name);
                    $("#eventDescription").val(pageEvents.data.result[i].Description);
                    $("#eventLocation").val(pageEvents.data.result[i].Location);
                    $("#eventDate").val(pageEvents.data.result[i].DateTime);
                    $("#eventTime").val(pageEvents.data.result[i].DateTime);
                    $("#eventDressCode").val(pageEvents.data.result[i].DressCode);
                }
            }
        }

        $("#eventModal").modal("show");
    },
    getData : function(){
        $.getJSON(pageEvents.baseURL,{
            type:'GE'
        },
            function(data){
                pageEvents.data = data;
                console.log(pageEvents.data);
            });
    },
    //Ajax requests to the api for fetching event data
    //Get event
    getEvent : function(){
        console.log(pageEvents.data.result.length);
        if(pageEvents.data.status == 1) {
            var str = "";
            if (pageEvents.data.result.length == 0) {
                $("#eventsDiv").html("<h3 class='text-center'>No Events Available</h3>");
            }
            else {
                str += ("<div class='col-xs-12'><table class='table table-hover' id='eventTable'><thead><tr><th>#</th><th>Title</th><th>Date & Time</th><th>Actions</th></tr></thead><tbody>");
                for (var i = 0; i < pageEvents.data.result.length; i++) {
                    str += ("<tr><th scope='row'>" + (i + 1) + "</th><td>" + pageEvents.data.result[i].Name + "</td><td> " + pageEvents.data.result[i].DateTime + " </td><td><span class='span-margin-20'><a href='#' onclick='pageEvents.openRSVPModal()'><i class='fa fa-lg fa fa-list-ol fa-blue'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.openEditEventModal(" + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-pencil fa-green'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.deleteEvent( " + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-trash-o fa-red'></i></a></span></td></tr>");
                }
                str += ("</tbody></table></div>");
                $("#eventsDiv").html("").html(str);
            }
            if (pageEvents.loginStatus == true) {
                $(".delete-btn").removeClass("hidden");
                $(".add-event-btn").removeClass("hidden");
            }
        }
    },

    //Delete Event
    deleteEvent : function(eventId){
        var conf = confirm("Are your sure ?");
        if(conf){
            $.post(pageEvents.baseURL + "?type=DE", {
                EventId: eventId
            }, function(data){
                console.log(data);
                console.log(data.status);
                if(data.status == 1){
                    pageEvents.getEvent();
                }
            });
        }
    },
    getLoginStatus : function(){
        var r = $.Deferred();
        $.getJSON(pageEvents.baseURL,{
            type:'LI'
        }, function (data) {
            console.log(data);
            pageEvents.loginStatus = data;
            r.resolve(data);
        });
        return r;
    }
};

$(document).ready(function () {
    pageEvents.getData();
    $('#eventDate').datepicker({
        format: "dd-mm-yyyy",
        startDate: "today",
        todayBtn: true,
        autoclose: true,
        todayHighlight: true
    });

    $("#eventTime").clockpicker({
        autoclose: true
    });

    pageEvents.getLoginStatus().done(function(){
        pageEvents.getEvent();
    });


    $("#eventModalForm").ajaxForm({
        beforeSubmit: function(){
            //Code to check validation & stop submit if validation fails

            if(!pageValidation.validateForm("#eventModalForm"))
                return pageValidation.validateForm("#eventModalForm");

            $("#loading").removeClass("hidden");
        },
        success : function(response, statusText, xhr, $form){
            //Code to perform after the success of form submit
            console.log(response);
            if(response.status == 0)
            {
                pageEvents.showfailureNotification("Error! ",response.message);
            }
            $('#eventModal').modal('hide');
            pageEvents.getEvent();
            $("#loading").addClass("hidden");
        },
        error : function(){
            //Code in case of an error
            pageEvents.showfailureNotification("Error! ","An error has occured, please try again!");
        }
    });


});

$(window).load(function() {
    $("#loading").addClass("hidden");
});