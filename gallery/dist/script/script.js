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
    addGallery: function(name, description){

    }


};

$(document).ready(function () {
    //Make api requests
    pageGallery.getGalleries();
});