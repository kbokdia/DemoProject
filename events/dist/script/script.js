var pageEvents = {
    data : null,
    baseURL : "controller.php",
    showSuccessNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    showWarningNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    showFailureNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-danger alert-dismissible' id='alertMsgDiv' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    openAddEventModal : function(){
        $("#eventModalForm").prop('action','controller.php?type=AE');
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
    openEditEventModal : function (eventId) {
        $("#eventModalForm").prop('action','controller.php?type=UE');
        var editEventId = eventId;
        console.log(editEventId);
        $('#eventModal').find('input').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $('#eventModal').find('select').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $('#eventModal').find('textarea').each(function(){
            $(this).val("").removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $("#eventID").val(eventId);
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
                    $("#eventDate").val(pageEvents.data.result[i].Date);
                    $("#eventTime").val(pageEvents.data.result[i].Time);
                    $("#eventDressCode").val(pageEvents.data.result[i].DressCode);
                }
            }
        }

        $("#eventModal").modal("show");
    },
    openRSVPModal : function(){
        $("#rsvpModal").modal("show");
    },
    getData : function(){
        var r = $.Deferred();
        $.getJSON(pageEvents.baseURL,{
            type:'GE'
        },
            function(data){
                pageEvents.data = data;
                console.log(pageEvents.data);
                r.resolve(data);
            });
        return r;
    },
    getEvent : function(){
        console.log(pageEvents.data.result.length);
        var date = new Date(),
            eventDate = "",
            eventTimeStamp = "",
            parts = "";

        if(pageEvents.data.status == 1) {
            var str = "";
            if (pageEvents.data.result.length == 0) {
                $("#eventsDiv").html("<h3 class='text-center'>No Events Available</h3>");
            }
            else {
                str += ("<div class='col-xs-12'><table class='table table-responsive table-hover' id='eventTable'><thead><tr><th>#</th><th>Title</th><th>Date</th><th>Time</th><th>Actions</th><th>Status</th></tr></thead><tbody>");
                for (var i = 0; i < pageEvents.data.result.length; i++) {

                    eventDate = pageEvents.data.result[i].Date;
                    eventTimeStamp = pageEvents.data.result[i].Timestamp;

                    parts = eventDate.split("/");
                    eventDate = new Date(parseInt(parts[2], 10),
                        parseInt(parts[1], 10) - 1,
                        parseInt(parts[0], 10));

                    eventTimeStamp = new Date(eventTimeStamp);

                    /*console.log(date);
                    console.log(eventDate);
                    console.log(eventTimeStamp);*/

                    var timeStampDiff = eventTimeStamp.getTime() - date.getTime();
                    var timeDiffDays = Math.ceil(timeStampDiff / (1000 * 3600 * 24));
                    console.log("Event Added to current date diff : " + timeDiffDays);

                    var eventTimeDiff = eventDate.getTime() - date.getTime();
                    var eventDiffDays = Math.ceil(eventTimeDiff / (1000 * 3600 * 24));
                    console.log("Event to current date diff : " + eventDiffDays);

                    //Check if date has exceeded 1 day of adding
                    if((timeDiffDays == 0 || timeDiffDays == 1) && eventDiffDays > 0)
                    {
                        str += ("<tr class='table-success'><td scope='row'>" + (i + 1) + "</td><td>" + pageEvents.data.result[i].Name + "</td><td> " + pageEvents.data.result[i].Date +" </td><td> " + pageEvents.data.result[i].Time +" </td><td><span class='span-margin-20'><a href='#' onclick='pageEvents.openRSVPModal()'><i class='fa fa-lg fa fa-list-ol fa-blue'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.openEditEventModal(" + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-pencil fa-green'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.deleteEvent( " + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-trash-o fa-red'></i></a></span></td><td>New Event</td></tr>");
                    }
                    else if(eventDiffDays > 0 && eventDiffDays != 1){
                        str += ("<tr class='table-info'><td scope='row'>" + (i + 1) + "</td><td>" + pageEvents.data.result[i].Name + "</td><td> " + pageEvents.data.result[i].Date +" </td><td> " + pageEvents.data.result[i].Time +" </td><td><span class='span-margin-20'><a href='#' onclick='pageEvents.openRSVPModal()'><i class='fa fa-lg fa fa-list-ol fa-blue'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.openEditEventModal(" + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-pencil fa-green'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.deleteEvent( " + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-trash-o fa-red'></i></a></span></td><td>Upcoming Event</td></tr>");
                    }
                    else if(eventDiffDays == 0){
                        str += ("<tr class='table-warning'><td scope='row'>" + (i + 1) + "</td><td>" + pageEvents.data.result[i].Name + "</td><td> " + pageEvents.data.result[i].Date +" </td><td> " + pageEvents.data.result[i].Time +" </td><td><span class='span-margin-20'><a href='#' onclick='pageEvents.openRSVPModal()'><i class='fa fa-lg fa fa-list-ol fa-blue'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.openEditEventModal(" + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-pencil fa-green'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.deleteEvent( " + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-trash-o fa-red'></i></a></span></td><td>Today is the Event</td></tr>");
                    }
                    else if(eventDiffDays < 0)
                    {
                        str += ("<tr class='table-danger'><td scope='row'>" + (i + 1) + "</td><td>" + pageEvents.data.result[i].Name + "</td><td> " + pageEvents.data.result[i].Date +" </td><td> " + pageEvents.data.result[i].Time +" </td><td><span class='span-margin-20'><a href='#' onclick='pageEvents.openRSVPModal()'><i class='fa fa-lg fa fa-list-ol fa-blue'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.openEditEventModal(" + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-pencil fa-green'></i></a></span><span class='span-margin-20'><a href='#' onclick='pageEvents.deleteEvent( " + pageEvents.data.result[i].EventId + ")'><i class='fa fa-lg fa-trash-o fa-red'></i></a></span></td><td>Event Completed</td></tr>");
                    }
                }
                str += ("</tbody></table></div>");
                $("#eventsDiv").html(str);
                $('#eventTable').DataTable({
                    responsive: true,
                    columnDefs: [
                        { type: 'date-uk', targets: 2, order: 'desc' }
                    ],
                    order: [[ 2, "desc" ]],
                    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        //debugger;
                        var index = iDisplayIndexFull + 1;
                        $("td:first", nRow).html(index);
                        return nRow;
                    },
                    "aoColumnDefs": [
                        { 'bSortable': false, 'aTargets': [ 0,3,4,5 ] }
                    ],
                });
            }
            if (pageEvents.loginStatus == true) {
                $(".delete-btn").removeClass("hidden");
                $(".add-event-btn").removeClass("hidden");
            }
        }
    },
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
    pageEvents.getData().done(function () {
        pageEvents.getEvent();
    });

    $("#rsvpTable").DataTable({
        responsive: true
    });

    $('#eventDate').datepicker({
        format: "dd/mm/yyyy",
        startDate: "today",
        autoclose: true,
        todayHighlight: true
    });

    $("#eventTime").clockpicker({
        autoclose: true,
        format: "hh:mm"
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
                pageEvents.showFailureNotification("Error! ",response.message);
            }
            $('#eventModal').modal('hide');
            pageEvents.getData().done(function () {
                pageEvents.getEvent();
            });
            $("#loading").addClass("hidden");
        },
        error : function(){
            //Code in case of an error
            pageEvents.showFailureNotification("Error! ","An error has occured, please try again!");
        }
    });


});

$(window).load(function() {
    $("#loading").addClass("hidden");

    jQuery.extend( jQuery.fn.dataTableExt.oSort, {
        "date-uk-pre": function ( a ) {
            if (a == null || a == "") {
                return 0;
            }
            var ukDatea = a.split('/');
            return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
        },

        "date-uk-asc": function ( a, b ) {
            return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },

        "date-uk-desc": function ( a, b ) {
            return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
    } );

});