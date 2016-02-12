/**
 * Created by kbokdia on 01/02/16.
 */
var pageAlbum = {
    imageCount : 0,
    baseURL : "controller.php",
    galleryId: window.location.search.split("=").pop(),
    loginStatus : false,
    imageData : "",

    showSuccessNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-success' role='alert'></button><strong> " + boldMsg + " </strong>" + msg + "</div>").fadeOut(5000);
        $(".alert").fadeOut(5000);
    },

    showWarningNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-warning' role='alert'><strong> " + boldMsg + " </strong>" + msg + "</div>").fadeOut(5000);
        $(".alert").fadeOut(5000);
    },

    showfailureNotification : function(boldMsg,msg){
        $("#alertOuterDiv").html("<div class='alert alert-danger' id='alertMsgDiv' role='alert'><strong> " + boldMsg + " </strong>" + msg + "</div>");
        $(".alert").fadeOut(5000);
    },

    //Get gallery images
    getImages: function(){
        //POST Request Type : GI
        //GalleryId => pageAlbum.galleryCode
        var r = $.Deferred();
        $.getJSON(pageAlbum.baseURL, {
            type: 'GI',
            GalleryId: pageAlbum.galleryId
        }, function (data) {
            pageAlbum.imageData = data;
            //console.log(data);
            //console.log(data.result.length);
            pageAlbum.imageCount = data.result.length;

            var imagesStr = "";
            if(data.status == 1) {
                if(data.result.length == 0)
                {
                    //console.log("inside 0");
                    imagesStr += "<h3 class='text-center'>No Images Available!</h3>"
                }
                else{
                    var preCount = 0;
                    for (var i = 0; i < data.result.length; i++) {
                        if( i - preCount == 3 || i == 2)
                        {
                            imagesStr += "<figure class='row'><a class='col-xs-4' href='" + data.result[i].ImagePath + "' itemprop='contentUrl' data-size='" + data.result[i].ImageWidth + "x" + data.result[i].ImageHeight + "'><img src='" + data.result[i].ThumbsPath + "' class='photoswipe-img-size img-responsive img-rounded' itemprop='thumbnail'/></a></figure>";
                            preCount = i;
                        }
                        else
                        {
                            imagesStr += "<figure><a class='col-xs-4' href='" + data.result[i].ImagePath + "' itemprop='contentUrl' data-size='" + data.result[i].ImageWidth + "x" + data.result[i].ImageHeight + "'><img src='" + data.result[i].ThumbsPath + "' class='photoswipe-img-size img-responsive img-rounded' itemprop='thumbnail'/></a></figure>";
                        }
                    }
                }
            }
            $("#albumImagesDiv").html(imagesStr);
            if(pageAlbum.loginStatus == true)
            {
                $(".delete-btn").removeClass("hidden");
                $(".add-album-btn").removeClass("hidden");
            }
            $("#loading").addClass("hidden");

            initPhotoSwipeFromDOM('.my-gallery');
            r.resolve();
        });
        return r;
    },

    getGalleryDetails: function(){
        //POST Request Type : GI
        //GalleryId => pageAlbum.galleryCode
        var r = $.Deferred();
        $.getJSON(pageAlbum.baseURL, {
            type: 'GD',
            GalleryId: pageAlbum.galleryId
        }, function (data) {
            //console.log(data);
            $("#eventTitle").html(data.result.GalleryName);
        });
    },

    //Implement delete image functionality
    deleteImage : function(galleryId, imageId){
        //POST Request TYPE : DI
        //Refer deleteGallery function in script.js
        var conf = confirm("Are your sure you want to delete this image?");
        if(conf){
            $.post(pageAlbum.baseURL + "?type=DI", {
                GalleryId: galleryId,
                ImageId : imageId
            }, function(data){
                if(data.status == 1){
                    pageAlbum.getImages();
                }
            });
        }
    },

    openAddImageModal : function () {
        $('#addImagesModalForm').find('input').each(function(){
            $(this).val("");
            $(this).removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
        $("#GalleryId").val(pageAlbum.galleryId);
        $("#progressOuterDiv").addClass('hidden');
        $("#progressbar").val("0");
        $("#modal-footer").removeClass("hidden");

        if(pageAlbum.imageCount == 19)
        {
            $("#ImageAddCountLimit").html("").html("You can upload " + (20 - pageAlbum.imageCount) + " more image!");
        }
        else{
            $("#ImageAddCountLimit").html("").html("You can upload " + (20 - pageAlbum.imageCount) + " more images!");
        }

        if(pageAlbum.imageCount >= 20)
        {
            $("#imageUploadBodyDiv").addClass("hidden");
            $("#imageUploadLimitDiv").removeClass("hidden");
            $("#submitImageBtn").addClass("hidden");
        }
        else{
            $("#imageUploadBodyDiv").removeClass("hidden");
            $("#imageUploadLimitDiv").addClass("hidden");
            $("#submitImageBtn").removeClass("hidden");
        }

        $("#addImagesModal").modal('show');
    },

    openDeleteImageModal : function(){
        //console.log(pageAlbum.imageData);
        var imgStr = "";
        $("#galleryId").val(pageAlbum.galleryId);

        if(pageAlbum.imageData.status == 1)
        {
            if(pageAlbum.imageData.result.length == 0)
            {
                $("#selectImageDiv").html("");
                //console.log("inside 0");
                imgStr += "<h3 class='text-center'>No Images Available!</h3>";
            }
            else{
                $("#selectImageDiv").html("Select images to delete");
                imgStr += "<div class='row'>";
                for(var i = 0; i < pageAlbum.imageData.result.length ; i++)
                {
                    if(i % 3 == 0 && i > 1)
                    {
                        imgStr += "</div><div class='row'>";
                    }
                    imgStr += "<li class='col-lg-4 col-xs-6'><input type='checkbox' id=' " + pageAlbum.imageData.result[i].Id + " ' name='ImageId[]' value='" + pageAlbum.imageData.result[i].Id + "'/><label for=' " + pageAlbum.imageData.result[i].Id + " '><img src=' " + pageAlbum.imageData.result[i].ThumbsPath + " ' /></label></li>";
                }
                imgStr += "</div>";
            }
            $("#imageDeleteBodyDiv").html(imgStr);
        }

        $("#deleteImagesModal").modal('show');
    },

    openFileInput : function(id){
        $(id).click();
    },

    backBtn : function(){
        window.location.href = "index.php";
    },

    getLoginStatus : function(){
        var r = $.Deferred();
        $.getJSON(pageAlbum.baseURL,{
            type:'LI'
        }, function (data) {
            //console.log(data);
            pageAlbum.loginStatus = data;
            r.resolve(data);
        });
        return r;
    }
};

$(document).ready(function (){
    //Make api requests
    pageAlbum.getLoginStatus().done(function () {
        pageAlbum.getImages();
        pageAlbum.getGalleryDetails();
    });

    //console.log($("#GalleryId").val());

    //Add Images
    $("#addImagesModalForm").ajaxForm({
        beforeSubmit: function(formData){
            //Code to check validation & stop submit if validation fails
            //console.log(formData);
            if(!pageValidation.validateForm("#addImagesModalForm"))
                return pageValidation.validateForm("#addImagesModalForm");

            $("#modal-footer").addClass("hidden");
            $("#progressOuterDiv").removeClass("hidden");
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $("#progressbar").prop('value',percentComplete).html(percentComplete + "% complete");
        },
        success : function(response, statusText, xhr, $form){
            //Code to perform after the success of form submit
            //console.log(response);
            if(response.status == 0)
            {
                pageAlbum.showfailureNotification("Error! ","An Error has occured!");
            }

            pageAlbum.showSuccessNotification("Success! ","Images have been uploaded!");

            $('#addImagesModal').modal('hide');
            pageAlbum.getImages();
        },
        error : function(){
            //Code in case of an error
            pageAlbum.showfailureNotification("Error! ","An error has occured, please try again!");
        }
    });

    //Delete Images
    $("#deleteImagesModalForm").ajaxForm({
        beforeSubmit: function(formData){
            //console.log(formData);
            //Code to check validation & stop submit if validation fails
            if(!pageValidation.validateForm("#deleteAlbumModalForm"))
                return pageValidation.validateForm("#deleteAlbumModalForm");

            $("#loading").removeClass("hidden");
        },
        success : function(response, statusText, xhr, $form){
            //Code to perform after the success of form submit
            //console.log(response);
            if(response.status == 0)
            {
                pageAlbum.showfailureNotification("Error! ", response.message);
            }
            $('#deleteImagesModal').modal('hide');
            pageAlbum.getImages().done(function () {
                $("#loading").addClass("hidden");
            });
        },
        error : function(){
            //Code in case of an error
            $("#loading").addClass("hidden");
            pageAlbum.showfailureNotification("Error! ","An error has occured, please try again!");
        }
    });

    $('#imageFileInput').change(function () {
        var count = $(this)[0].files.length,
            imageLimit = 0;
        if(pageAlbum.imageCount < 20)
        {
            imageLimit = 20 - pageAlbum.imageCount;

            if(parseInt(count) > imageLimit)
            {
                //console.log(count);
                $(this).val("");
                $(this).closest(".form-group").find(".error").html("").html("More than 20 Images Selected");
            }
            else{
                //console.log(count);
                for(var i = 0; i < count; i++)
                {
                    //console.log(count);
                    if((this.files[i].size) > (5 * 1024 * 1024))
                    {
                        //console.log(this.files[0].size);
                        $(this).val("");
                        $(this).closest(".form-group").find(".error").html("").html("One or more images have size greater than 5 MB, please remove them and try again!");
                        break;
                    }
                    else{
                        $(this).closest(".form-group").find(".error").html("").html(count + " Images Selected");
                    }
                }
            }
        }
    });



});

$(window).load(function() {
    //console.log(pageAlbum.loginStatus);
});