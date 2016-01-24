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
    var $imageArr;

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

    //Delete gallery
    function deleteGallery($galleryId){
        $sql = "SELECT GalleryName FROM Gallery WHERE Id = $galleryId";
        if($result = $this->mysqli->query($sql)){
            $path = "albums/".$result->fetch_assoc()['GalleryName'];
            BaseClass::deleteDir($path);
            $sql = "DELETE FROM Gallery WHERE Id = $galleryId";
            if($this->mysqli->query($sql)){
                $response = BaseClass::createResponse(1,"Album deleted");
            }
            else{
                $response = BaseClass::createResponse(0,$this->mysqli->error);
            }
        }
        else{
            $response = BaseClass::createResponse(0,"Invalid request");
        }

        return $response;
    }

    //save gallery image
    function saveGalleryImage($galleryId){
        //todo-ambuj save image file then the details in GalleryImage Table
        $resp = array();
        $sql="Select galleryName from Gallery where galleryID=$galleryId";
        if($result2=$this->mysqli->query($sql))
        {

            $path2 = "albums/" . $result2->fetch_assoc()['GalleryName'];

            //have to save multiple images
            for ($this->imageArr as $img)
            {
                //$img is same as $this->coverImage in saveGallery function
                //while saving the image save it with their id name
                //  Eg:
                //  $imageUpload->dstPath = $galleryPath;
                //  $imageUpload->dstName = $this->generateImageId();
                $imageUpload = new ImageUpload($img);
                $imageUpload->dstPath = $path2;
                $imageUpload->dstName = $galleryId;

                if($imageUpload->save())
                {
                    $imageSavePath=$path2."/".$galleryId."/".$img."jpg";
                    $imgId=$this->generateImageId();
                    $sql="insert into GalleryImage(Id,GalleryId,ImagePath,Caption,ImageWidth,ImageHeight) values($imgId,$galleryId,'$imageSavePath','Hi','200','200')";
                    if($result = $this->mysqli->query($sql))
                    {
                        $resp = BaseClass::createResponse(1,"Image saved..");
                    }
                    else
                    {
                       $resp = BaseClass::createResponse(0,"Image not saved..");
                    }

                }
            }
            return $resp;
        }
    }

    //delete gallery image
    function deleteGalleryImage()
    {

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