/**
 * Created by kbokdia on 01/02/16.
 */
var pageAlbum = {
    imageCount : 0,
    baseURL : "controller.php",
    galleryId: window.location.search.split("=").pop(),
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
                    imagesStr += "<div class='row'>";
                    for (var i = 0; i < data.result.length; i++) {
                        if(i % 3 == 0 && i > 0)
                        {
                            imagesStr += "</div><div class='row'>";
                        }
                        imagesStr += "<div class='col-xs-4'><div><figure><a href='" + data.result[i].ImagePath + "' itemprop='contentUrl' data-size='" + data.result[i].ImageWidth + "x" + data.result[i].ImageHeight + "'><img src='" + data.result[i].ThumbsPath + "' class='img-responsive img-rounded' itemprop='thumbnail'/></a></figure></div><div class='text-right delete-btn hidden'><a href='#' onclick='pageAlbum.deleteImage(" + data.result[i].GalleryId + ","+ data.result[i].Id + ")'><i class='fa fa-lg fa-trash-o fa-red'></i></a></div></div>";
                    }
                }
                imagesStr += "</div>";
            }
            $("#albumImagesDiv").html(imagesStr);
            if(pageAlbum.loginStatus == true)
            {
                $(".delete-btn").removeClass("hidden");
                $(".add-album-btn").removeClass("hidden");
            }
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
                $(this).closest(".form-group").find(".error").html("").html(count + " Images Selected");
            }
        }
    });



});

$(window).load(function() {

    console.log(pageAlbum.loginStatus);

    $("#loading").addClass("hidden");
});