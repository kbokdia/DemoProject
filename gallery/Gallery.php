<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 22/01/16
 * Time: 1:14 PM
 */

namespace Project\gallery;

use Project\base\BaseClass;
use Project\upload\ImageUpload;

class Gallery extends BaseClass
{
    var $galleryName;
    var $imageCount;
    var $coverImagePath;

    function __construct(){
        parent::__construct();
    }

    //save gallery info
    function saveGalleryInfo(){
        /*todo-ambuj
            save cover file in folder "albums/<gallery-name>/cover.jpg"
            To upload file use ImageUpload class
            create insert query and save to db and on success return true else false
        */

        //sample upload class code
        /*$imageUpload = new ImageUpload($_FILES['fileToUpload']);
        $imageUpload->dstPath = $path;
        $imageUpload->dstName = $name;
        if($imageUpload->save()){
            return $imageUpload->response;
        }
        else{
            return $imageUpload->response;
        }*/

        //Insert query


        //Ambuj
        GLOBAL $gallID;
        GLOBAL $imgName;
        $GLOBALS['success']=true;
        $gallName=$_POST['galleryName'];
        $img=$_FILES['fileToUpload'];


        //Check if gallery exists.
        $sql="select GalleryName from Gallery where GalleryName=$gallName";
        $result = $this->mysqli->query($sql);
        if(!$result)
        {
            //If not,then create directory and move image.
            mkdir('Project/albums/$gallName');
            //Get an id for the new gallery.
            $gallID=$this->generateGalleryId();
            $uploaddir= 'Project/albums/$gallName/';
            $uploadfile = $uploaddir . basename($img['name']);
            if (move_uploaded_file($img['tmp_name'], $uploadfile))
            {
                $GLOBALS['success']=true;
            }
            else{
                $GLOBALS['success']=false;
            }
        }


        else
        {
            //If folder exists,just move the image.
            $uploaddir = 'Project/albums/$gallName/';
            $imgName=$img['name'];
            $uploadfile = $uploaddir . basename($img['name']);
            if (move_uploaded_file($img['tmp_name'], $uploadfile))
            {
                $GLOBALS['success']=true;
            }
            else{
                $GLOBALS['success']=false;
            }
        }



        //Store gallery details.
        $sql2="insert into Gallery(CoverImagePath,GalleryName,Id,ImageCount) values('Project/albums/$gallName/$imgName','$gallName',".$gallID.",(ImageCount+1)";
        if($GLOBALS['success']==true) {
            $result2 = $this->mysqli->query($sql2);
            if (!$result2)
                return false;
            else
                return true;
        }
        else
            return false;


        //End

    }

    //generate gallery ID
    function generateGalleryId(){
        $galleryCode = 1001;
        $sql = "SELECT MAX(Id) AS 'galleryCode' FROM Gallery";
        if($result = $this->mysqli->query($sql)){
            $galleryCode = intval($result->fetch_assoc()['galleryCode']);
            $galleryCode = (($galleryCode == 0) ? 1001 : $galleryCode + 1);
        }

        return $galleryCode;
    }

    //save gallery image
    function saveGalleryImage($galleryId){
        //todo-ambuj save image file then the details in GalleryImage Table
    }

    //generate image ID
    function generateImageId(){
        $imageCode = 1001;
        $sql = "SELECT MAX(Id) AS 'imageCode' FROM Gallery";
        if($result = $this->mysqli->query($sql)){
            $imageCode = intval($result->fetch_assoc()['imageCode']);
            $imageCode = (($imageCode == 0) ? 1001 : $imageCode + 1);
        }

        return $imageCode;
    }

}