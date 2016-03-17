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
            <div id="memberDetailsDiv">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Kamlesh Bokdia</h4>
                                </div>
                                <div class="col-md-2 col-lg-1 col-xs-1">
                                    <a onclick="viewMembers.openEditMemberModal(this)"><i
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
                                        <strong>No.1 Road, No. 2 Flat, Street Name, Area Name, City Name, State
                                            Name</strong>
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
            </div>
            <div id="spouseDetailsDiv">
                <div class="col-md-6">
                    <div id="addSpouseDetails" class="text-xs-center padding-top-50">
                        <button type="button" class="btn btn-info-outline btn-lg"
                                onclick="viewMembers.openAddSpouseModal()"><i class="fa fa-plus fa-2x"></i><br>Add
                            Spouse Details
                        </button>
                    </div>
                    <div id="editSpouseDetails" class="card hidden-xs-up">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Spouse Details</h4>
                                </div>
                                <div class="col-md-2 col-lg-1 col-xs-1">
                                    <a onclick="viewMembers.openEditSpouseModal()"><i
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
                                        <strong>No.1 Road, No. 2 Flat, Street Name, Area Name, City Name, State
                                            Name</strong>
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
        </div>
        <div class="row">
            <div id="residenceDetailsDiv">
                <div class="col-md-6">
                    <div id="addResidenceDetails" class="text-xs-center padding-top-50">
                        <button type="button" class="btn btn-info-outline btn-lg"
                                onclick="viewMembers.openAddResidenceModal()"><i class="fa fa-plus fa-2x"></i><br>Add
                            Residence Details
                        </button>
                    </div>
                    <div id="editResidenceDetails" class="card hidden-xs-up">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Residence Details</h4>
                                </div>
                                <div class="col-md-2 col-lg-1 col-xs-1">
                                    <a onclick="viewMembers.openEditResidenceModal()"><i
                                            class="fa fa-pencil fa-lg fa-green"></i></a></div>
                            </div>
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>House Addr : </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <strong>No.1 Road, No. 2 Flat, Street Name, Area Name, City Name, State
                                            Name</strong>
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
            </div>
            <div id="clubDetailsDiv">
                <div id="addClubDetails" class="text-xs-center padding-top-50">
                    <button type="button" class="btn btn-info-outline btn-lg"
                            onclick="viewMembers.openAddClubModal()"><i class="fa fa-plus fa-2x"></i><br>Add
                        Club Details
                    </button>
                </div>
                <div id="editClubDetails" class="col-md-6 hidden-xs-up">
                    <div class="card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Club Details</h4>
                                </div>
                                <div class="col-md-2 col-lg-1 col-xs-1">
                                    <a onclick="viewMembers.openEditClubModal()"><i
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
        </div>
        <div class="row">
            <div id="childDetailsDiv">
                <div class="col-md-6" id="editChildDiv1">
                    <div class="card">
                        <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 col-lg-11 col-xs-11"><h4 class="card-title">Child 1 Name</h4></div>
                            <div class="col-md-2 col-lg-1 col-xs-1">
                                <a onclick="viewMembers.openEditChildModal()"><i
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
                <div class="col-md-6 text-xs-center padding-top-50" id="addChildDetails">
                    <button type="button" class="btn btn-info-outline btn-lg"
                            onclick="viewMembers.openAddChildModal()"><i class="fa fa-plus fa-2x"></i><br>Add
                        Child Details
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        <small class="text-muted">Last updated 3 mins ago</small>
    </div>
</div>


<!-- Add Member Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="memberForm" method="post" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="memberHeader"></h4>
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
                                <input type="text" class="form-control noSpecialChar" id="guardianName"
                                       name="guardianName"
                                       placeholder="Enter Guardian Name">
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberDOB" class="col-sm-3 form-control-label">DOB *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control date" name="memberDOB" id="memberDOB"
                                       placeholder="Enter Date of Birth" required>
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
                                <input type="text" class="form-control" name="memberBusinessType"
                                       id="memberBusinessType"
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
                            <label for="memberOfficePhone" class="col-sm-3 form-control-label">Office Phone</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="memberOfficePhone" id="memberOfficePhone"
                                       placeholder="Office Phone">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberOfficeCentrex" class="col-sm-3 form-control-label">Office Centrex</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="memberOfficeCentrex"
                                       id="memberOfficeCentrex"
                                       placeholder="Office Phone">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="memberMarital" class="col-sm-3 form-control-label">Marital Status</label>
                            <div class="col-sm-9">
                                <select class="c-select form-control" id="memberMarital" name="memberMarital"
                                        onchange="viewMembers.maritalStatusDivChange(this)">
                                    <option value="1">Single</option>
                                    <option value="2">Engaged</option>
                                    <option value="3">Married</option>
                                </select>
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row hidden-xs-up" id="dateOfMarriage">
                            <label for="memberMarital" class="col-sm-3 form-control-label" id="domLabel">Date of
                                Marriage</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control date" name="memberDOM" id="memberDOM"
                                       placeholder="Enter Date of Marriage">
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

<!-- Spouse Modal -->
<div class="modal fade" id="spouseModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="memberForm" method="post" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="spouseHeader"></h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-6">
                        <fieldset class="form-group row">
                            <label for="spouseName" class="col-sm-3 form-control-label">Name *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control noSpecialChar" name="spouseName" id="spouseName"
                                       placeholder="Enter Spouse Name" required>
                            </div>

                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseDOB" class="col-sm-3 form-control-label">DOB *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control date" name="spouseDOB" id="spouseDOB"
                                       placeholder="Enter Date of Birth" required>
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseEmail" class="col-sm-3 form-control-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control email" name="spouseEmail" id="spouseEmail"
                                       placeholder="Enter Email">
                            </div>

                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseEmail1" class="col-sm-3 form-control-label">Alternate Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control email" name="spouseEmail1" id="spouseEmail1"
                                       placeholder="Enter Alternate Email">
                            </div>

                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseMobile" class="col-sm-3 form-control-label">Mobile *</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control number" name="spouseMobile" id="spouseMobile"
                                       placeholder="Enter Mobile" required>
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseMobile1" class="col-sm-3 form-control-label">Mobile 1</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control number" name="spouseMobile1" id="spouseMobile1"
                                       placeholder="Enter Alternate Mobile">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseMobile2" class="col-sm-3 form-control-label">Mobile 2</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control number" name="spouseMobile2" id="spouseMobile2"
                                       placeholder="Enter Alternate Mobile">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseBloodGroup" class="col-sm-3 form-control-label">Blood Group</label>
                            <div class="col-sm-9">
                                <select class="c-select form-control" id="spouseBloodGroup" name="spouseBloodGroup">
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
                            <label for="spouseHobbies" class="col-sm-3 form-control-label">Hobbies</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="spouseHobbies" id="spouseHobbies"
                                       placeholder="Enter Spouse Hobbies">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseRecognition" class="col-sm-3 form-control-label">Recognition</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="spouseRecognition" id="spouseRecognition"
                                       placeholder="Enter Spouse Recognition">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset class="form-group row">
                            <label for="spouseOccupation" class="col-sm-3 form-control-label">Occupation</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="spouseOccupation" id="spouseOccupation"
                                       placeholder="Enter Spouse Occupation">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseBusinessType" class="col-sm-3 form-control-label">Business Type</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="spouseBusinessType"
                                       id="spouseBusinessType"
                                       placeholder="Enter Spouse Type">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseOfficeAddr1" class="col-sm-3 form-control-label">Office Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="spouseOfficeAddr1" id="spouseOfficeAddr1"
                                       placeholder="Door No./Building Name">
                                <input type="text" class="form-control" name="spouseOfficeAddr2" id="spouseOfficeAddr2"
                                       placeholder="Street">
                                <input type="text" class="form-control" name="spouseOfficeAddr3" id="spouseOfficeAddr3"
                                       placeholder="Area">
                                <input type="text" class="form-control" name="spouseOfficeAddr4" id="spouseOfficeAddr4"
                                       placeholder="City & Pincode">
                                <input type="text" class="form-control" name="spouseOfficeAddr5" id="spouseOfficeAddr5"
                                       placeholder="State">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseOfficePhone" class="col-sm-3 form-control-label">Office Phone</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="spouseOfficePhone" id="spouseOfficePhone"
                                       placeholder="Office Phone">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="spouseOfficeCentrex" class="col-sm-3 form-control-label">Office Centrex</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="spouseOfficeCentrex"
                                       id="spouseOfficeCentrex"
                                       placeholder="Office Phone">
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

<!-- Residence Modal -->
<div class="modal fade" id="residenceModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="residenceForm" method="post" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="residenceHeader"></h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-6">
                        <fieldset class="form-group row">
                            <label for="residenceAddr1" class="col-sm-3 form-control-label">Residence Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="residenceAddr1" id="residenceAddr1"
                                       placeholder="Door No./Building Name">
                                <input type="text" class="form-control" name="residenceAddr2" id="residenceAddr2"
                                       placeholder="Street">
                                <input type="text" class="form-control" name="residenceAddr3" id="residenceAddr3"
                                       placeholder="Area">
                                <input type="text" class="form-control" name="residenceAddr4" id="residenceAddr4"
                                       placeholder="City & Pincode">
                                <input type="text" class="form-control" name="residenceAddr5" id="residenceAddr5"
                                       placeholder="State">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="residencePhone" class="col-sm-3 form-control-label">Residence Phone</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="residencePhone" id="residencePhone"
                                       placeholder="Residence Phone">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="residenceCentrex" class="col-sm-3 form-control-label">Residence Centrex</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="residenceCentrex" id="residenceCentrex"
                                       placeholder="Residence Phone">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset class="form-group row">
                            <label for="religion" class="col-sm-3 form-control-label">Religion</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="religion" id="religion"
                                       placeholder="Religion">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="religion" class="col-sm-3 form-control-label">Religion</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="religion" id="religion"
                                       placeholder="Religion">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="foodPreferences" class="col-sm-3 form-control-label">Food Preferences</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="foodPreferences" id="foodPreferences"
                                       placeholder="Food Preferences">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="nativePlace" class="col-sm-3 form-control-label">Native Place</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nativePlace" id="nativePlace"
                                       placeholder="Native Place">
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

<!-- Club Modal -->
<div class="modal fade" id="clubModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="clubForm" method="post" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="clubHeader"></h4>
                </div>
                <div class="modal-body">
                        <fieldset class="form-group row">
                            <label for="clubMembershipNo" class="col-sm-3 form-control-label">Membership No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="clubMembershipNo" id="clubMembershipNo"
                                       placeholder="Club Membership Number">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="clubMembershipType" class="col-sm-3 form-control-label">Membership Type</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="clubMembershipType" id="clubMembershipType"
                                       placeholder="Membership Type">
                            </div>
                            <div class="error"></div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <label for="clubMembershipSince" class="col-sm-3 form-control-label">Membership Since</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="clubMembershipSince date" id="clubMembershipSince"
                                       placeholder="Membership Since">
                            </div>
                            <div class="error"></div>
                        </fieldset>
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

<!-- Child Modal -->
<div class="modal fade" id="childModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="childForm" method="post" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="childHeader"></h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-group row">
                        <label for="clubMembershipNo" class="col-sm-3 form-control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="childName" id="childName"
                                   placeholder="Child's Name">
                        </div>
                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="childGender" class="col-sm-3 form-control-label">Gender</label>
                        <div class="col-sm-9">
                            <select class="c-select form-control" id="childGender" name="childGender">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="childEmail" class="col-sm-3 form-control-label">Child Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="childEmail email" id="childEmail"
                                   placeholder="Child Email">
                        </div>
                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label for="childMobile" class="col-sm-3 form-control-label">Child Mobile</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" name="childMobile email" id="childMobile"
                                   placeholder="Child Mobile">
                        </div>
                        <div class="error"></div>
                    </fieldset>
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

<script src="../dist/script/jquery-2.2.0.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<script src="../dist/script/bootstrap4.js"></script>

<script rel="script" src="../dist/script/load-image.min.js"></script>
<script rel="script" src="../dist/script/jquery-form.min.js"></script>
<script rel="script" src="../dist/script/script.js"></script>
<script rel="script" src="../dist/script/validation.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.js'></script>

<script rel="script" src="dist/script/view.js"></script>
<script rel="script" src="../dist/script/bootstrap-datepicker.min.js"></script>

</body>
</html>