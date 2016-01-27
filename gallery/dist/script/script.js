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
    //Implement add gallery using $.post
    addGallery: function(name, description) {
        $.post(pageGallery.baseURL, {
            type: 'AG',
            galleryName: name,
            galleryDescription: description

        },function(data) {
            console.log(data);
        });
    },

    //Implement delete gallery using $.post
    deleteGallery: function(galleryId){
        $.post(pageGallery.baseURL, {
            type: 'DG',
            galleryId: galleryId
        }, function(data){
            console.log(data);
        });
    }

};

$(document).ready(function () {
    //Make api requests
    pageGallery.getGalleries();
    pageGallery.addGallery('test','test gallery');
    pageGallery.deleteGallery(1);
});