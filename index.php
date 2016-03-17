<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gallery for Club Apps">
    <meta name="keywords" content="Club Apps, Gallery, Club Gallery, Photos, Images, Clubs, Chennai Clubs">
    <meta name="author" content="The Appsolutes">

    <!-- Bootstrap & font-awesome min CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link rel="stylesheet" href="dist/css/bootstrap4.css">
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="dist/css/style.css">
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
    <h4 class="text-center navbar-heading">Login</h4>
</nav>

<div class="container container-top-padding-100">
    <div class="col-md-6 col-md-offset-3">
        <div class="card card-block">
            <div class="form-group row">
                <label for="inputEmail3" class="col-md-2 form-control-label">Email</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-md-2 form-control-label">Password</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-offset-4 col-md-4">
                    <button type="submit" class="btn btn-primary-outline btn-block">Sign in</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Files -->

<!-- JQuery min JS -->
<script src="dist/script/jquery-2.2.0.min.js"></script>

<!-- Bootstrap min JS -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<script src="dist/script/bootstrap4.js" crossorigin="anonymous"></script>

<!-- Local Script -->
<script rel="script" src="dist/script/script.js"></script>
<script rel="script" src="dist/script/validation.js"></script>

</body>
</html>