var pageGallery = {
    baseURL : "controller.php",
    loginStatus : false,
    showSuccessNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    showWarningNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    showfailureNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-danger alert-dismissible' id='alertMsgDiv' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong> " + boldMsg + " </strong>" + msg + "</div>")
    },
    //It will make ajax request to the api and fetch the gallery data
    getGalleries : function (){
        $.getJSON(pageGallery.baseURL,{
            type:'GG'
        }, function (data) {
            //console.log(data);
            //console.log(data.result.length);
            if(data.status == 1)
            {
                var str = "";
                if(data.result.length == 0){
                    $("#albumsDiv").html("<h3 class='text-center'>No Albums Available</h3>");
                }
                else
                {
                    for(var i = 0 ; i < data.result.length; i++)
                    {
                        str += ("<div class='col-md-4 col-sm-12'><div class='card'><a href='view.php?galleryId=" + data.result[i].Id + "'><img class='card-img-top' src='" + data.result[i].CoverImagePath + "' alt='Gallery Cover Image'><div class='card-block'><h4 class='card-title'>" + data.result[i].GalleryName + "</h4><p class='card-text'>" + data.result[i].GalleryDescription + "</p></div></a><div class='card-block'><button onclick='pageGallery.deleteGallery(" + data.result[i].Id + ")' type='button' class='btn btn-danger btn-full-width delete-btn hidden'>Delete </button></div></div></div>");
                    }
                    $("#albumsDiv").html("").html(str);
                }
                if(pageGallery.loginStatus == true)
                {
                    $(".delete-btn").removeClass("hidden");
                    $(".add-album-btn").removeClass("hidden");
                }
            }
        });
    },
    //Implement delete gallery using $.post
    deleteGallery: function(galleryId){
        var conf = confirm("Are your sure ?");
        if(conf){
            $.post(pageGallery.baseURL + "?type=DG", {
                GalleryId: galleryId
            }, function(data){
                //console.log(data);
                //console.log(data.status);
                if(data.status == 1){
                    pageGallery.getGalleries();
                }
            });
        }
    },
    openAddGalleryModal : function(){
        $('#addAlbumModalForm').find('input').each(function(){
            $(this).val("");
            $(this).removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $("#image-view").html("<img src='albums/cover-image.jpg' alt='Cover Image' class='img-rounded coverImage'/>");

        $('#addGalleryModal').modal('show');
    },
    openFileInput : function(id){
        $(id).click();
    },
    getLoginStatus : function(){
        var r = $.Deferred();
        $.getJSON(pageGallery.baseURL,{
            type:'LI'
        }, function (data) {
            //console.log(data);
            pageGallery.loginStatus = data;
            r.resolve(data);
        });
        return r;
    }
};

$(document).ready(function () {
    //Make api requests
    pageGallery.getLoginStatus().done(function(){
        pageGallery.getGalleries();
    });
    //Load Local Cover Image on Change
    $("#coverImageFile").change(function(e){
        loadImage.parseMetaData(
            e.target.files[0],
            function(data){
                //console.log(data);
                var orientation = false;
                if(data.exif){
                    orientation = data.exif.get('Orientation');
                }
                loadImage(
                    e.target.files[0],
                    function (img) {
                        //console.log(img);
                        $("#image-view").html(img);
                    },
                    {
                        maxWidth: 300,
                        maxHeight: 300,
                        canvas: true,
                        orientation: orientation
                    } // Options
                );
            }
        );
        if($("#coverImageFile").val() == "")
        {
            $("#image-view").html("<img src='albums/cover-image.jpg' alt='Cover Image' class='img-rounded coverImage'/>");
        }
    });
    $("#addAlbumModalForm").ajaxForm({
        beforeSubmit: function(){
            //Code to check validation & stop submit if validation fails

            if(!pageValidation.validateForm("#addAlbumModalForm"))
                return pageValidation.validateForm("#addAlbumModalForm");

            $("#loading").removeClass("hidden");
        },
        success : function(response, statusText, xhr, $form){
            //Code to perform after the success of form submit
            //console.log(response);
            if(response.status == 0)
            {
                pageGallery.showfailureNotification("Error! ",response.message);
            }
            $('#addGalleryModal').modal('hide');
            pageGallery.getGalleries();
            $("#loading").addClass("hidden");
        },
        error : function(){
            //Code in case of an error
            $("#loading").addClass("hidden");
            pageGallery.showfailureNotification("Error! ","An error has occured, please try again!");
        }
    });

    $("#albumName").on('input propertychange focusout', function () {
        pageValidation.validateField(this);
    });
    $("#albumDescription").on('input propertychange focusout', function () {
        pageValidation.validateField(this);
    });
});

$(window).load(function() {

    $("#loading").addClass("hidden");
});