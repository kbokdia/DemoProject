/**
 * Created by kbokdia on 01/02/16.
 */
pageAlbum = {
    baseURL : "controller.php",
    galleryCode: window.location.search.split("=").pop(),

    //Get gallery images
    getImages: function(){
        //POST Request Type : GI
        //GalleryId => pageAlbum.galleryCode
        $.getJSON(pageGallery.baseURL, {
            type: 'GI'
        }, function (data) {
            console.log(data);
            console.log(data.result.length);
        });
    },

    //Implement delete image functionality
    deleteImage : function(galleryId, imageId){
        //Request TYPE : DI
        //Refer deleteGallery function in script.js
        $.getJSON(pageGallery.baseURL, {
            type: 'DI'
        }, function (data) {
            console.log(data);
            console.log(data.result.length);
        });
    }
};

$(document).ready(function (){
    //Make api requests
    pageGallery.getImages();

    //Load Local Image on Change
    $("#albumImageFile").change(function(e){
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
        if($("#albumImageFile").val() == "")
        {
           //html code
        }
    });

});