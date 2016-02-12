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
    <link rel="stylesheet" href="../dist/css/style.css">

    <!-- Photoswipe CSS file -->
    <link rel="stylesheet" href="../dist/css/photoswipe.css">
    <link rel="stylesheet" href="../dist/css/default-skin/default-skin.css">

    <style>
        .my-gallery {
            width: 100%;
            float: left;
        }
        .my-gallery img {
            width: 100%;
            height: auto;
        }
        figure {
            margin: 1rem 0 0;
        }
    </style>

<!--<link rel='stylesheet prefetch' href='http://photoswipe.s3.amazonaws.com/pswp/dist/photoswipe.css'>
<link rel='stylesheet prefetch' href='http://photoswipe.s3.amazonaws.com/pswp/dist/default-skin/default-skin.css'>-->

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
    <a class="navbar-brand position-fixed" href="#" onclick="pageAlbum.backBtn()"><i class="fa fa-chevron-left fa-lg"></i>&nbsp;Back</a>
    <h4 class="text-center navbar-heading" id="headingText">Gallery</h4>
</nav>
<div class="container container-top-padding">
    <div class="alertDiv" id="alertOuterDiv">

    </div>
    <div class="row">
    <div class="text-center">
        <h5 id="eventTitle"></h5>
    </div>
    <div class="text-right">
        <div class="col-xs-12">
            <button type="button" class="btn btn-success-outline add-album-btn hidden" onclick="pageAlbum.openAddImageModal()"><i
                    class="fa fa-plus"></i>&nbsp;Add Images
            </button>
            <button type="button" class="btn btn-danger-outline add-album-btn hidden" onclick="pageAlbum.openDeleteImageModal()"><i
                    class="fa fa-trash-o"></i>&nbsp;Delete Images
            </button>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>

    <div class="row my-gallery row-top-margin" id="albumImagesDiv">

    </div>
</div>

<div class="modal fade" id="addImagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addImagesModalForm" action="controller.php?type=AI" method="post" enctype="multipart/form-data" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="AIHeader">Add Images</h4>
                </div>
                <div class="modal-body" id="imageUploadBodyDiv">
                    <div class="text-center error">
                        <strong id="ImageAddCountLimit">*You can select a maximum of 20 Photos*</strong>
                    </div>
                    <fieldset class="form-group text-center btn-padding-top">
                        <button type="button" id="coverImageBtn" class="btn btn-primary"
                                onclick="pageAlbum.openFileInput(imageFileInput)">Choose Images *
                        </button>
                        <div class="error" style="padding-top: 10px"></div>
                        <input type="hidden" name="GalleryId" id="GalleryId"/>
                        <input type="file" id="imageFileInput" name="fileToUpload[]" value="" class="hidden" multiple required>
                    </fieldset>
                </div>
                <div class="modal-body hidden" id="imageUploadLimitDiv">
                    <div class="text-center error">
                        <strong>*20 Images already added, delete some to add more*</strong>
                    </div>
                </div>
                <div class="modal-footer" id="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="submitImageBtn">Submit</button>
                </div>
                <div class="hidden" id="progressOuterDiv">
                    <progress id="progressbar" class="progress progress-striped progress-success" value="0" max="100">0%</progress>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteImagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="deleteImagesModalForm" action="controller.php?type=DM" method="post" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="DIHeader">Delete Images</h4>
                </div>
                <div class="modal-body">
                    <strong class="error">
                        <div class="text-center" id="selectImageDiv">Select images to delete</div>
                    </strong>
                    <div class="row">
                        <ul class="col-xs-12" id="imageDeleteBodyDiv">

                        </ul>
                    </div>
                </div>
                <div class="modal-footer" id="modal-footer">
                    <input type="hidden" id="galleryId" name="GalleryId"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="submitImageBtn">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>

<!-- JQuery min JS -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

<!-- Bootstrap min JS -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" crossorigin="anonymous"></script>

<!-- Local Script -->
<script src="../dist/script/photoswipe.min.js"></script>
<script src="../dist/script/photoswipe-ui-default.min.js"></script>
<script src="../dist/script/photoswipe-index.js"></script>

<script rel="script" src="../dist/script/load-image.min.js"></script>
<script rel="script" src="../dist/script/jquery-form.min.js"></script>
<script rel="script" src="dist/script/album.js"></script>
<script rel="script" src="../dist/script/validation.js"></script>



</body>
</html>