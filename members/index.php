<!DOCTYPE html>
<html>
<head>
    <title>Members</title>

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
    <h4 class="text-center navbar-heading">Members</h4>
</nav>
<div class="container container-top-padding">
    <div class="alertDiv" id="alertOuterDiv">

    </div>
    <div class="row text-right">
        <div class="col-xs-12">
            <button type="button" class="btn btn-success-outline add-event-btn" onclick="pageMembers.openAddMemberModal()"><i
                    class="fa fa-plus"></i>&nbsp;Add Member
            </button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row row-top-margin" id="membersDiv">
        <table id="membersTable" class="table table-responsive">
            <thead>
            <tr class="table-info">
                <th>#</th>
                <th>Image</th>
                <th>Member</th>
                <th>Mobile</th>
                <th>Platform</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></th>
                <td><img class="img-responsive img-rounded memberImg" src="../testImages/t-levitt-quote.png"></td>
                <td><a href="#">Kamlesh</a><br><a href="#">Hina</a></td>
                <td>9444610605<br>9444610606</td>
                <td>
                    <div><i class="fa fa-apple fa-lg fa-grey"></i></div>
                    <div><i class="fa fa-android fa-lg fa-green"></i></div>
                </td>
                <td class="vertical-middle">
                    <div>
                        <a class="fa-right-20" href="view.php"><i class="fa fa-pencil fa-custom fa-green"></i></a>
                        <a class="fa-right-20" onclick="pageMembers.openLoginDetailsModal(this)"><i class="fa fa-sign-in fa-custom fa-blue"></i></a>
                        <a class="fa-right-20" onclick="pageMembers.openDeleteModal(this)"><i class="fa fa-trash-o fa-custom fa-red"></i></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td></th>
                <td>
                    <img class="img-responsive img-rounded memberImg" src="../testImages/t-levitt-quote.png">
                </td>
                <td>
                    <a href="#">Ambuj</a><br>
                    <a href="#">Anjali</a>
                </td>
                <td>
                    9444610605<br>9444610606
                </td>
                <td>
                    <i class="fa fa-apple fa-lg fa-grey"></i><br>
                    <i class="fa fa-android fa-lg fa-green"></i>
                </td>
                <td class="vertical-middle">
                    <div>
                        <a class="fa-right-20" href="view.php"><i class="fa fa-pencil fa-custom fa-green"></i></a>
                        <a class="fa-right-20" href="#" onclick="pageMembers.openLoginDetailsModal(this)"><i class="fa fa-sign-in fa-custom fa-blue"></i></a>
                        <a class="fa-right-20" href="#" onclick="pageMembers.openDeleteModal(this)"><i class="fa fa-trash-o fa-custom fa-red"></i></a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Member -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="memberForm" method="post" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="memberHeader">Add Member</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-6">
                        <fieldset class="form-group row">
                            <label for="memberName" class="col-sm-3 form-control-label">Name *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control noSpecialChar" name="memberName" id="memberName"
                                       placeholder="Enter Member Name" required>
                            </div>

                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="guardianName" class="col-sm-3 form-control-label">Guardian Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control noSpecialChar" id="guardianName" name="guardianName"
                                       placeholder="Enter Guardian Name">
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberDOB" class="col-sm-3 form-control-label">DOB *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control date" name="memberDOB" id="memberDOB" placeholder="Enter Date of Birth" required>
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberEmail" class="col-sm-3 form-control-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control email" name="memberEmail" id="memberEmail"
                                       placeholder="Enter Email">
                            </div>

                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberEmail1" class="col-sm-3 form-control-label">Alternate Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control email" name="memberEmail1" id="memberEmail1"
                                       placeholder="Enter Alternate Email">
                            </div>

                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberMobile" class="col-sm-3 form-control-label">Mobile *</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control number" name="memberMobile" id="memberMobile"
                                       placeholder="Enter Mobile" required>
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberMobile1" class="col-sm-3 form-control-label">Mobile 1</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control number" name="memberMobile1" id="memberMobile1"
                                       placeholder="Enter Alternate Mobile">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberMobile2" class="col-sm-3 form-control-label">Mobile 2</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control number" name="memberMobile2" id="memberMobile2"
                                       placeholder="Enter Alternate Mobile">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberGender" class="col-sm-3 form-control-label">Gender</label>
                            <div class="col-sm-9">
                                <select class="c-select form-control" id="memberGender" name="memberGender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberBloodGroup" class="col-sm-3 form-control-label">Blood Group</label>
                            <div class="col-sm-9">
                                <select class="c-select form-control" id="memberBloodGroup" name="memberBloodGroup">
                                    <option value="1">O+</option>
                                    <option value="2">O-</option>
                                    <option value="3">A+</option>
                                    <option value="4">A-</option>
                                    <option value="5">B+</option>
                                    <option value="6">B-</option>
                                    <option value="7">AB+</option>
                                    <option value="8">AB-</option>
                                </select>
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberHobbies" class="col-sm-3 form-control-label">Hobbies</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="memberHobbies" id="memberHobbies"
                                       placeholder="Enter Member Hobbies">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberRecognition" class="col-sm-3 form-control-label">Recognition</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="memberRecognition" id="memberRecognition"
                                       placeholder="Enter Member Recognition">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset class="form-group row">
                            <label for="memberOccupation" class="col-sm-3 form-control-label">Occupation</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="memberOccupation" id="memberOccupation"
                                       placeholder="Enter Member Occupation">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberBusinessType" class="col-sm-3 form-control-label">Business Type</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="memberBusinessType" id="memberBusinessType"
                                       placeholder="Enter Business Type">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberOfficeAddr1" class="col-sm-3 form-control-label">Office Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="memberOfficeAddr1" id="memberOfficeAddr1"
                                       placeholder="Door No./Building Name">
                                <input type="text" class="form-control" name="memberOfficeAddr2" id="memberOfficeAddr2"
                                       placeholder="Street">
                                <input type="text" class="form-control" name="memberOfficeAddr3" id="memberOfficeAddr3"
                                       placeholder="Area">
                                <input type="text" class="form-control" name="memberOfficeAddr4" id="memberOfficeAddr4"
                                       placeholder="City & Pincode">
                                <input type="text" class="form-control" name="memberOfficeAddr5" id="memberOfficeAddr5"
                                       placeholder="State">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberOfficePhone" class="col-sm-3 form-control-label">Office Address</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="memberOfficePhone" id="memberOfficePhone"
                                       placeholder="Office Phone">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberOfficeCentrex" class="col-sm-3 form-control-label">Office Centrex</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="memberOfficeCentrex" id="memberOfficeCentrex"
                                       placeholder="Office Phone">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberMarital" class="col-sm-3 form-control-label">Marital Status</label>
                            <div class="col-sm-9">
                                <select class="c-select form-control" id="memberMarital" name="memberMarital" onchange="pageMembers.maritalStatusDivChange(this)">
                                    <option value="1">Single</option>
                                    <option value="2">Engaged</option>
                                    <option value="3">Married</option>
                                </select>
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row hidden-xs-up" id="dateOfMarriage">
                            <label for="memberMarital" class="col-sm-3 form-control-label" id="domLabel">Date of Marriage</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control date" name="memberDOM" id="memberDOM" placeholder="Enter Date of Marriage">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center"><i class="fa fa-exclamation-triangle fa-red fa-right-10"></i>Delete Member?</h4>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Are you sure you want to delete this member?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-outline"><i class="fa fa-check fa-lg fa-right-10"></i>Yes</button>
                    <button type="button" class="btn btn-danger-outline" data-dismiss="modal"><i class="fa fa-times fa-lg fa-right-10"></i>No</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Login Details Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center">Login Details</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-xs-3 form-control-label">Name</label>
                        <div class="col-xs-9">
                            <p class="form-control-static">Kamlesh</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 form-control-label">ID</label>
                        <div class="col-xs-9">
                            <p class="form-control-static">9444610605</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-xs-3 form-control-label">Password</label>
                        <div class="col-xs-9">
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Password" value="kamlesh">
                                <span class="input-group-btn">
                                    <button class="btn btn-warning-outline showPassword" type="button"><i class="fa fa-eye-slash"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group row">
                        <label class="col-xs-3 form-control-label">Name</label>
                        <div class="col-xs-9">
                            <p class="form-control-static">Hina</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 form-control-label">ID</label>
                        <div class="col-xs-9">
                            <p class="form-control-static">9444610606</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-xs-3 form-control-label">Password</label>
                        <div class="col-xs-9">
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Password" value="hina">
                                <span class="input-group-btn">
                                    <button class="btn btn-warning-outline showPassword" type="button"><i class="fa fa-eye-slash"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-outline"><i class="fa fa-check fa-lg fa-right-10"></i>Update</button>
                    <button type="button" class="btn btn-danger-outline" data-dismiss="modal"><i class="fa fa-times fa-lg fa-right-10"></i>No</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script Files -->

<!-- JQuery min JS -->
<script src="../dist/script/jquery-2.2.0.min.js"></script>

<!-- Bootstrap min JS -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<script src="../dist/script/bootstrap4.js" crossorigin="anonymous"></script>

<!-- Local Script -->
<script rel="script" src="../dist/script/load-image.min.js"></script>
<script rel="script" src="../dist/script/jquery-form.min.js"></script>
<script rel="script" src="../dist/script/script.js"></script>
<script rel="script" src="../dist/script/validation.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.js'></script>

<script rel="script" src="dist/script/script.js"></script>
<script rel="script" src="../dist/script/bootstrap-datepicker.min.js"></script>

<script rel="script" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script rel="script" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap4.min.js"></script>
<script rel="script" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
<script rel="script" src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>

</body>
</html>