<!DOCTYPE html>
<html>
<head>
    <title>Events</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Events for Club Apps">
    <meta name="keywords" content="Club Apps, Events, Club Events, Photos, Images, Clubs, Chennai Clubs">
    <meta name="author" content="The Appsolutes">

    <!-- Bootstrap & font-awesome min CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../dist/css/bootstrap4.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../dist/css/font-awesome.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="../dist/css/style.css">
    <link rel="stylesheet" href="../dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../dist/css/bootstrap-clockpicker.min.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css">
</head>
<body>

<div class="loader-container" id="loading">
    <div class="loader">
        <span class="L">L</span>
        <span class="O">O</span>
        <span class="A">A</span>
        <span class="D">D</span>
        <span class="I">I</span>
        <span class="N">N</span>
        <span class="G">G</span>
        <span class="L">.</span>
        <span class="O">.</span>
        <span class="A">.</span>
    </div>
</div>

<nav class="navbar navbar-fixed-top navbar-light bg-faded">
    <h4 class="text-center navbar-heading">Events</h4>
</nav>
<div class="container container-top-padding">
    <div class="alertDiv" id="alertOuterDiv">

    </div>
    <div class="row text-right">
        <div class="col-xs-12">
            <button type="button" class="btn btn-success-outline add-event-btn" onclick="pageEvents.openAddEventModal()"><i
                    class="fa fa-plus"></i>&nbsp;Add Event
            </button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row row-top-margin" id="eventsDiv">

    </div>
</div>



<!-- Add Event Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="eventModalForm" method="post" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="AEHeader"></h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-group row">
                        <label for="eventName" class="col-sm-3 form-control-label">Name *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control noSpecialChar" name="EventName" id="eventName" placeholder="Enter Event Name" required>
                        </div>

                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventDescription" class="col-sm-3 form-control-label">Description *</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="eventDescription" name="EventDesc" rows="2" placeholder="Enter Event Description" required></textarea>
                        </div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventName" class="col-sm-3 form-control-label">Location *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="EventLocation" id="eventLocation" placeholder="Enter Event Location" required>
                        </div>

                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventDate" class="col-sm-3 form-control-label">Date *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control date" name="EventDate" id="eventDate" placeholder="Enter Event Date" required>
                        </div>
                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventDate" class="col-sm-3 form-control-label">Time *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control date" name="EventTime" id="eventTime" placeholder="Enter Event Time" required>
                        </div>

                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventName" class="col-sm-3 form-control-label">Dress Code *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="EventDressCode" id="eventDressCode" placeholder="Enter Event Dress Code" required>
                        </div>

                        <div class="error"></div>
                    </fieldset>
                    <input type="hidden" id="eventID" name="EventId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- RSVP Modal -->
<div class="modal fade" id="rsvpModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="RSVPHeader">Member Confirmation</h4>
            </div>
            <div class="modal-body">
                <table class="table table-responsive" id="rsvpTable">
                    <thead>
                    <tr class="table-info">
                        <th>#</th>
                        <th>Name</th>
                        <th><span class="span-margin-20"><i class="fa fa-lg fa-male"></i></span></th>
                        <th><span class="span-margin-20"><i class="fa fa-lg fa-female"></i></span></th>
                        <th><span class="span-margin-20"><i class="fa fa-lg fa-child"></i></span></th>
                        <th><span class="span-margin-20"><i class="fa fa-lg fa-users"></i></span></th>
                        <th><span class="span-margin-20"><i class="fa fa-lg fa-check"></i></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Darshan A Turakhia</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Kamlesh Bokdia</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Ambuj</td>
                        <td>1</td>
                        <td>0</td>
                        <td>0</td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary-outline">Download CSV</button>
                <button type="button" class="btn btn-danger-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Script Files -->

<!-- JQuery min JS -->
<script src="../dist/script/jquery-2.2.0.min.js"></script>

<!-- Bootstrap min JS -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<script src="../dist/script/bootstrap4.js"></script>

<!-- Local Script -->
<script rel="script" src="../dist/script/load-image.min.js"></script>
<script rel="script" src="../dist/script/jquery-form.min.js"></script>
<script rel="script" src="../dist/script/script.js"></script>
<script rel="script" src="../dist/script/validation.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.js'></script>


<script rel="script" src="dist/script/script.js"></script>
<script rel="script" src="../dist/script/bootstrap-datepicker.min.js"></script>
<script rel="script" src="../dist/script/bootstrap-clockpicker.min.js"></script>

<script rel="script" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script rel="script" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap4.min.js"></script>
<script rel="script" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
<script rel="script" src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>

</body>
</html>