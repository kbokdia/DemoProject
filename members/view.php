<!DOCTYPE html>
<html>
<head>
    <title>Member Details</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Events for Club Apps">
    <meta name="keywords" content="Club Apps, Events, Club Events, Photos, Images, Clubs, Chennai Clubs">
    <meta name="author" content="The Appsolutes">

    <!-- Bootstrap & font-awesome min CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../dist/css/bootstrap4.css">
    <link rel="stylesheet" href="../dist/css/font-awesome.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="../dist/css/style.css">
    <link rel="stylesheet" href="../dist/css/bootstrap-datepicker.min.css">
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
    <h4 class="text-center navbar-heading" id="navbarTitle">Member Details</h4>
</nav>
<div class="container container-top-padding container-bottom-padding">
    <div class="alertDiv" id="alertOuterDiv">

    </div>
    <div class="text-right">
        <button type="button" class="btn btn-danger-outline"><i class="fa fa-trash-o fa-lg fa-red fa-right-10"></i>Delete
            Member
        </button>
    </div>
    <div class="row-top-margin" id="eventsDiv">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="card">
                    <img class="card-img-top" alt="Member Image"
                         src="../testImages/Minimal-Cartoon-Cloud-Wallpaper.jpg">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Kamlesh Bokdia</h4></div>
                            <div class="col-md-2 col-lg-1 col-xs-1">
                                <a href="#" onclick="viewMembers.openMemberModal(this)"><i
                                        class="fa fa-pencil fa-lg fa-green"></i></a></div>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Gaurdian Name : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Sunil Bokdia</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>DOB : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>14/11/1992</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Email : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong><a href="mailto:kbokdia@gmail.com">kbokdia@gmail.com</a><br><a
                                            href="mailto:contact@theappsolutes.com">contact@theappsolutes.com</a></strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Mobile : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong><a href="tel:9444610605">9444610605</a><br><a href="tel:9444610605">9444610605</a><br><a
                                            href="tel:9444610605">9444610605</a></strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Gender : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Male</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Blood Group : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>A+ ve</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Hobbies : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Sleeping</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Recognition : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>iOS Developer, Awesome Guy</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Occupation : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Developer</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Business Type : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Web Developers</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Office Address : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>No.1 Road, No. 2 Flat, Street Name, Area Name, City Name, State Name</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Office Phone : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>1234567<br>#12345</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Marital Status : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Single</strong>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Spouse Details</h4></div>
                            <div class="col-md-2 col-lg-1 col-xs-1">
                                <a href="#" onclick="viewMembers.openSpouseModal(this)"><i
                                        class="fa fa-pencil fa-lg fa-green"></i></a></div>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>DOB : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>14/11/1992</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Email : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong><a href="mailto:kbokdia@gmail.com">kbokdia@gmail.com</a><br><a
                                            href="mailto:contact@theappsolutes.com">contact@theappsolutes.com</a></strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Mobile : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong><a href="tel:9444610605">9444610605</a><br><a href="tel:9444610605">9444610605</a><br><a
                                            href="tel:9444610605">9444610605</a></strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Gender : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Male</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Blood Group : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>A+ ve</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Hobbies : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Sleeping</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Recognition : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>iOS Developer, Awesome Guy</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Occupation : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Developer</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Business Type : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Web Developers</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Office Address : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>No.1 Road, No. 2 Flat, Street Name, Area Name, City Name, State Name</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Office Phone : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>1234567<br>#12345</strong>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Residence Details</h4></div>
                            <div class="col-md-2 col-lg-1 col-xs-1">
                                <a href="#" onclick="viewMembers.openResidenceModal(this)"><i
                                        class="fa fa-pencil fa-lg fa-green"></i></a></div>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>House Addr : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>No.1 Road, No. 2 Flat, Street Name, Area Name, City Name, State Name</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>House Phone : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>1234567<br>#12345</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Religion : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Jain</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Food Preference : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Veg</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Native Place : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Gujarat</strong>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Club Details</h4></div>
                            <div class="col-md-2 col-lg-1 col-xs-1">
                                <a href="#" onclick="viewMembers.openClubModal(this)"><i
                                        class="fa fa-pencil fa-lg fa-green"></i></a></div>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Membership No : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>1234</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Membership Type : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Lifetime</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Member Since : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>1 year & 1 month</strong>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Child 1 Name</h4></div>
                            <div class="col-md-2 col-lg-1 col-xs-1">
                                <a href="#" onclick="viewMembers.openKidsModal(this)"><i
                                        class="fa fa-pencil fa-lg fa-green"></i></a></div>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>DOB : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>11/11/2011</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Gender : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Female</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Email : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>test@gmail.com</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Mobile : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>987653</strong>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Child 2 Name</h4></div>
                            <div class="col-md-2 col-lg-1 col-xs-1">
                                <a href="#" onclick="viewMembers.openKidsModal(this)"><i
                                        class="fa fa-pencil fa-lg fa-green"></i></a></div>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>DOB : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>11/11/2011</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Gender : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>Female</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Email : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>test@gmail.com</strong>
                                </div>
                            </div>
                            <hr class="hr"/>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Mobile : </label>
                                </div>
                                <div class="col-sm-8">
                                    <strong>987653</strong>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right"><small class="text-muted">Last updated 3 mins ago</small></div>
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
                            <input type="text" class="form-control noSpecialChar" name="EventName" id="eventName"
                                   placeholder="Enter Event Name" required>
                        </div>

                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventDescription" class="col-sm-3 form-control-label">Description *</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="eventDescription" name="EventDesc" rows="2"
                                      placeholder="Enter Event Description" required></textarea>
                        </div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventName" class="col-sm-3 form-control-label">Location *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="EventLocation" id="eventLocation"
                                   placeholder="Enter Event Location" required>
                        </div>

                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventDate" class="col-sm-3 form-control-label">Date *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control date" name="EventDate" id="eventDate"
                                   placeholder="Enter Event Date" required>
                        </div>
                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventDate" class="col-sm-3 form-control-label">Time *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control date" name="EventTime" id="eventTime"
                                   placeholder="Enter Event Time" required>
                        </div>

                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="eventName" class="col-sm-3 form-control-label">Dress Code *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="EventDressCode" id="eventDressCode"
                                   placeholder="Enter Event Dress Code" required>
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


<script rel="script" src="dist/script/view.js"></script>
<script rel="script" src="../dist/script/bootstrap-datepicker.min.js"></script>

</body>
</html>