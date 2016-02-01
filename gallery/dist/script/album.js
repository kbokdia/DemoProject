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
        var url = pageGallery.baseURL + "?type=GI";
    },

    //Implement delete image functionality
    deleteImage : function(galleryId, imageId){
        //Request TYPE : DI
        //Refer deleteGallery function in script.js
    }
};