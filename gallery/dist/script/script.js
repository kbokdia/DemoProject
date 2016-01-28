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

    //Todo-Ambuj
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
    }

};

$(document).ready(function () {
    //Make api requests
    pageGallery.getGalleries();
});