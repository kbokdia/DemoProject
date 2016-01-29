var pageGallery = {
    baseURL : "controller.php",

    //It will make ajax request to the api and fetch the gallery data
    getGalleries : function (){
        $.getJSON(pageGallery.baseURL,{
            type:'GG'
        }, function (data) {
            console.log(data);
        });
    },

    //Implement delete gallery using $.post
    deleteGallery: function(galleryId){
        var confirm = confirm("Are your sure ?");
        if(confirm){
            pageGallery.baseURL += "?type=DG";
            $.post(pageGallery.baseURL, {
                GalleryId: galleryId
            }, function(data){
                console.log(data);
            });
        }
    },

    openAddGalleryModal : function(){
        $('#addGalleryModal').modal('show');
    },

    openFileInput : function(id){
        console.log(id);
        $(id).click();
    }
};

$(document).ready(function () {
    //Make api requests
    pageGallery.getGalleries();

    //Load Local Cover Image on Change
    $("#coverImageFile").change(function(e){
        loadImage.parseMetaData(
            e.target.files[0],
            function(data){
                console.log(data);
                var orientation = false;
                if(data.exif){
                    orientation = data.exif.get('Orientation');
                }
                loadImage(
                    e.target.files[0],
                    function (img) {
                        console.log(img);
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

    //TODO Ambuj
    $("#addAlbumModal").ajaxForm({
        beforeSubmit: function(){
            //Code to check validation & stop submit if validation fails
            pageValidation.validateForm("#addAlbumModal");
            $("#loading").removeClass("hidden");
        },
        success : function(){
            //Code to perform after the success of form submit
            $('#addGalleryModal').modal('hide');
            $("#loading").addClass("hidden");
        },
        error : function(){
            //Code in case of an error
        }
    });

});

$(window).load(function() {
    $("#loading").addClass("hidden");
});