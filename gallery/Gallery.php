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
    var $coverImage;

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
        $response = array();

        //Check if gallery exists.
        $sql="select GalleryName from Gallery where GalleryName=$this->galleryName";
        $result = $this->mysqli->query($sql);
        if($result)
        {
            $path = "albums/$this->galleryName";
            if($result->num_rows == 0){
                //If not,then create directory and move image.
                if(!file_exists($path)){
                    mkdir($path);
                }
                //Get an id for the new gallery.
                $gallID=$this->generateGalleryId();
                $imageUpload = new ImageUpload($this->coverImage);
                $imageUpload->dstPath = $path;
                $imageUpload->dstName = $gallID;

                //if image uploaded then save the record to the db.
                if($imageUpload->save()){
                    //ImageUpload class by default saves all the image to jpg
                    $imagePath = $path."/".$gallID.".jpg";
                    $sql="INSERT INTO Gallery(Id, GalleryName, ImageCount, CoverImagePath) VALUES ($gallID,'$this->galleryName',0,'$imagePath')";
                    if($result = $this->mysqli->query($sql)){
                        $response = BaseClass::createResponse(1,"Gallery created..");
                    }
                }
                else{
                    return $imageUpload->response;
                }
            }
            else{
                $response = BaseClass::createResponse(0,"Gallery already exists..");
            }
            return $response;
        }
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