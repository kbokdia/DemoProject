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
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-light bg-faded">
    <a class="navbar-brand position-fixed" href="#"><i class="fa fa-chevron-left fa-lg"></i>&nbsp;Back</a>
    <h4 class="text-center navbar-heading">Gallery</h4>
</nav>
<div class="container container-top-padding">
    <div class="row text-right">
        <div class="col-xs-12">
            <button type="button" class="btn btn-success-outline"><i class="fa fa-plus"></i>&nbsp;Add Album</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row row-top-margin">
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <img class="card-img-top" src="albums/sample/cover.jpg" data-src="..." alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Event Name</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <button type="button" class="btn btn-danger btn-full-width">Delete</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <img class="card-img-top" src="albums/sample1/cover.jpg" data-src="..." alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Event Name</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <button type="button" class="btn btn-danger btn-full-width">Delete</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <img class="card-img-top" src="albums/sample2/cover.jpg" data-src="..." alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Event Name</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <button type="button" class="btn btn-danger btn-full-width">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Files -->

<!-- JQuery min JS -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

<!-- Bootstrap min JS -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" crossorigin="anonymous"></script>

<!-- Local Script -->
<script rel="script" src="dist/script/script.js"></script>

</body>
</html>