/**
 * Created by kbokdia on 01/02/16.
 */
var pageAlbum = {
    imageCount : 0,
    baseURL : "controller.php",
    galleryId: window.location.search.split("=").pop(),
    loginStatus : false,

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
        $.getJSON(pageAlbum.baseURL, {
            type: 'GI',
            GalleryId: pageAlbum.galleryId
        }, function (data) {
            console.log(data);
            console.log(data.result.length);
            pageAlbum.imageCount = data.result.length;

            var imagesStr = "";
            if(data.status == 1) {
                if(data.result.length == 0)
                {
                    console.log("inside 0");
                    imagesStr += "<h3 class='text-center'>No Images Available!</h3>"
                }
                else{
                    for (var i = 0; i < data.result.length; i++) {
                        imagesStr +=
                            "<figure class='col-sm-3 col-xs-6'>" +
                                "<a href='" + data.result[i].ImagePath + "' itemprop='contentUrl' data-size='" + data.result[i].ImageWidth + "x" + data.result[i].ImageHeight + "'>" +
                                    "<img src='" + data.result[i].ThumbsPath + "' class='img-responsive img-rounded' itemprop='thumbnail'/>" +
                                "</a>" +
                                "<div class='text-right delete-btn hidden'>" +
                                    "<a href='#' onclick='pageAlbum.deleteImage(" + data.result[i].GalleryId + ","+ data.result[i].Id + ")'>" +
                                        "<i class='fa fa-lg fa-trash-o fa-red'></i>" +
                                    "</a>" +
                                "</div>" +
                            "</figure>";
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
                console.log(data);
                console.log(data.status);
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
            console.log(data);
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
    });

    console.log($("#GalleryId").val());

    //Add Images
    $("#addImagesModalForm").ajaxForm({
        beforeSubmit: function(formData){
            //Code to check validation & stop submit if validation fails
            console.log(formData);
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
            console.log(response);
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

    $('#imageFileInput').change(function () {
        var count = $(this)[0].files.length,
            imageLimit = 0;
        if(pageAlbum.imageCount < 20)
        {
            imageLimit = 20 - pageAlbum.imageCount;

            if(parseInt(count) > imageLimit)
            {
                console.log(count);
                $(this).val("");
                $(this).closest(".form-group").find(".error").html("").html("More than 20 Images Selected");
            }
            else{
                console.log(count);
                for(var i = 0; i < count; i++)
                {
                    console.log(count);
                    if((this.files[i].size) > (5 * 1024 * 1024))
                    {
                        console.log(this.files[0].size);
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
    console.log(pageAlbum.loginStatus);
});