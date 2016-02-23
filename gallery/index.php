<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gallery for Club Apps">
    <meta name="keywords" content="Club Apps, Gallery, Club Gallery, Photos, Images, Clubs, Chennai Clubs">
    <meta name="author" content="The Appsolutes">

    <!-- Bootstrap & font-awesome min CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../dist/css/bootstrap4.css">
    <link rel="stylesheet" href="../dist/css/font-awesome.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="../dist/css/style.css">
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
    <h4 class="text-center navbar-heading">Gallery</h4>
</nav>
<div class="container container-top-padding" style="padding-bottom: 50px">
    <div class="alertDiv" id="alertOuterDiv">

    </div>
    <div class="row text-right">
        <div class="col-xs-12">
            <button type="button" class="btn btn-success-outline add-album-btn hidden" onclick="pageGallery.openAddGalleryModal()"><i
                    class="fa fa-plus"></i>&nbsp;Add Album
            </button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row row-top-margin" id="albumsDiv">

    </div>
</div>

<!-- Add Gallery Modal -->
<div class="modal fade" id="addGalleryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addAlbumModalForm" action="controller.php?type=AG" method="post" enctype="multipart/form-data" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="AGHeader">Add Album</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-group row">
                        <label class="col-sm-3 form-control-label" for="albumName">Name *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control noSpecialChar" name="GalleryName" id="albumName"
                               placeholder="Enter name of album" required>
                        </div>
                        <div class="error"></div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <label class="col-sm-3 form-control-label" for="albumDescription">Description *</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control noSpecialChar" name="GalleryDescription" id="albumDescription"
                               placeholder="Enter name of album" required>
                        </div>
                        <div class="error"></div>
                        <small class="text-muted" style="padding-left: 10px">Please provide a brief description about the event.</small>
                    </fieldset>
                    <fieldset class="form-group text-center">
                        <button type="button" id="coverImageBtn" class="btn btn-primary"
                                onclick="pageGallery.openFileInput(coverImageFile)">Choose Cover Image *
                        </button>
                        <div class="error"></div>
                        <input type="file" id="coverImageFile" name="fileToUpload" value="" class="hidden" required>
                    </fieldset>
                    <fieldset class="form-group text-center" id="image-view">
                        <img src="albums/cover-image.jpg" alt="Cover Image" class="img-rounded coverImage"/>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
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
<script rel="script" src="dist/script/script.js"></script>
<script rel="script" src="../dist/script/validation.js"></script>

</body>
</html>