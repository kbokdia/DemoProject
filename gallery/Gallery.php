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
    var $galleryDescription;
    var $imageCount;
    var $coverImage;
    var $images = array();

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
        $response = array();

        //Get an id for the new gallery.
        $gallID=$this->generateGalleryId();

        $path = "albums/".$gallID."/";

        //If not,then create directory and move image.
        if(!file_exists($path)){
            mkdir($path);
            mkdir($path."SD/");
            mkdir($path."Thumbs/");
        }
        $imageUpload = new ImageUpload($this->coverImage);
        $imageUpload->dstPath = $path;
        $imageUpload->dstName = 'cover';

        //if image uploaded then save the record to the db.
        if($imageUpload->save()){
            //ImageUpload class by default saves all the image to jpg
            $imagePath = $path."cover.jpg";
            $sql="INSERT INTO Gallery(Id, GalleryName, GalleryDescription, ImageCount, CoverImagePath) VALUES ($gallID,'$this->galleryName', '$this->galleryDescription',0,'$imagePath')";
            if($result = $this->mysqli->query($sql)){
                $response = BaseClass::createResponse(1,"Gallery created..");
            }
        }
        else{
            return $imageUpload->response;
        }

        //End
        return $response;
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
        $path = "albums/".$galleryId;
        if(is_dir($path)){
            BaseClass::deleteDir($path);
        }
        $sql = "DELETE FROM Gallery WHERE Id = $galleryId; DELETE FROM GalleryImage WHERE GalleryId = $galleryId;";
        if($this->runMultipleQuery($sql)['status'] == 1){
            $response = BaseClass::createResponse(1,"Album deleted");
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }

        return $response;
    }

    //save gallery image
    function saveGalleryImage($galleryId){
        //todo-ambuj save image file then the details in GalleryImage Table
        $resp = array();
        $path2 = "albums/" .$galleryId."/SD/";

        //have to save multiple images
        foreach ($this->images as $img){
            //$img is same as $this->coverImage in saveGallery function
            //while saving the image save it with their id name
            //  Eg:
            //  $imageUpload->dstPath = $galleryPath;
            //  $imageUpload->dstName = $this->generateImageId();
            $imgId = $this->generateImageId();
            $imageUpload = new ImageUpload($img);
            $imageUpload->dstPath = $path2;
            $imageUpload->dstName = $imgId;

            if($imageUpload->save())
            {
                $imageSavePath=$path2.$imgId.".jpg";

                // Get new sizes
                list($width, $height) = getimagesize($imageSavePath);
                list($newWidth, $newHeight) = $this->getScaledDimArray($imageSavePath);

                // Load
                $thumb = imagecreatetruecolor($newWidth, $newHeight);
                $source = imagecreatefromjpeg($imageSavePath);

                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                // Output
                $thumbsFilePath = "albums/".$galleryId."/Thumbs/".$imgId.".jpg";
                imagejpeg($thumb,$thumbsFilePath);

                $sql="insert into GalleryImage(Id,GalleryId,ImagePath,ThumbsPath,Caption,ImageWidth,ImageHeight) values($imgId,$galleryId,'$imageSavePath', '$thumbsFilePath', null,'".$width."','".$height."')";
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

        $sql = "UPDATE Gallery SET ImageCount = (SELECT COUNT(*) as 'ImageCount' FROM GalleryImage WHERE GalleryImage.GalleryId = $galleryId) WHERE Gallery.Id = $galleryId";

        $this->mysqli->query($sql) OR die($this->mysqli->error);
        return $resp;
    }

    //delete gallery image
    function deleteGalleryImage($galleryId,$imgId)
    {
        $sql="Select ImagePath,ThumbsPath from GalleryImage where Id=$imgId AND GalleryId = $galleryId";
        if($result = $this->mysqli->query($sql))
        {
            $row = $result->fetch_assoc();
            $path = $row['ImagePath'];
            $thumbsPath = $row['ThumbsPath'];

            if(file_exists($path)){
                unlink($path);
            }
            if(file_exists($thumbsPath)){
                unlink($thumbsPath);
            }
            $sql = "DELETE FROM GalleryImage WHERE Id = $imgId";
            if($this->mysqli->query($sql)){
                $response = BaseClass::createResponse(1,"Image deleted");
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

    //delete multiple images
    function deleteMultipleImages($galleryId,$imgIds){
        //$imgIds is array || Eg: $imgIds = array(1001,1003,1002);
        //for loop $imgIds so that you will get single id and then call $this->deleteGalleryImage($galleryId,$imgId) inside the for loop
        $imagesDeleted = 0;
        foreach($imgIds as $photo)
        {
            $response = $this->deleteGalleryImage($galleryId,$photo);
            if($response['status'] == 1){
                $imagesDeleted++;
            }
        }
        $response = BaseClass::createResponse(1,$imagesDeleted." image/s deleted");
        return $response;
    }

    //generate image ID
    function generateImageId(){
        $imageCode = 1001;
        $sql = "SELECT MAX(Id) AS 'imageCode' FROM GalleryImage";
        if($result = $this->mysqli->query($sql)){
            $imageCode = intval($result->fetch_assoc()['imageCode']);
            $imageCode = (($imageCode == 0) ? 1001 : $imageCode + 1);
        }

        return $imageCode;
    }

    //Scale image proportionately
    function getScaledDimArray($img,$max_w = 170, $max_h = 170){
        if(is_null($max_h)){
            $max_h = $max_w;
        }
        if (file_exists($img)){
            list($img_w,$img_h) = getimagesize($img);
            $f = min($max_w/$img_w, $max_h/$img_h, 1);
            $w = round($f * $img_w);
            $h = round($f * $img_h);
            return array($w,$h);
        }
        return NULL;
    }

    //Get galleries
    function getGalleries(){
        /*
         * Response array
         * Success :   array('status'=>1,'message'=>'Success','result'=>array(data))
         * Fail    :   array('status'=>0,'message'=>'error message')
         */

        $sql = "SELECT * FROM Gallery";
        if($result = $this->mysqli->query($sql)){
            $i = 0;
            $response = BaseClass::createResponse(1,"Success");
            $response['result'] = array();
            while($row = $result->fetch_assoc()){
                $response['result'][$i++] = $row;
            }
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }

    //Get gallery info : This function is to get particular information about the gallery
    function getGalleryInfo($galleryId){
        //Get data from GalleryImage table using $galleryId variable
        /*
         * Response array
         * Success :   array('status'=>1,'message'=>'Success','result'=>array(data))
         * Fail    :   array('status'=>0,'message'=>'error message')
         */
        $sql="SELECT * FROM GalleryImage where GalleryId=$galleryId";
        if($result = $this->mysqli->query($sql))
        {
            $i=0;
            $response = BaseClass::createResponse(1,"Success");
            $response['result'] = array();
            while($row = $result->fetch_assoc())
            {
                $response['result'][$i++] = $row;
            }
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;

    }

    function getGalleryDetails($galleryId){
        $sql="SELECT * FROM Gallery where Id=$galleryId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Success");
            $response['result'] = array();
            while($row = $result->fetch_assoc())
            {
                $response['result'] = $row;
            }
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }

    //Run multiple sql queries
    function runMultipleQuery($sql){
        if ($this->mysqli->multi_query($sql) === TRUE) {
            $response = $this->createResponse(1,"Successful");
            while($this->mysqli->more_results()){
                $this->mysqli->next_result();
                if($result = $this->mysqli->store_result()){
                    $result->free();
                }
            }
        }
        else{
            $response = $this->createResponse(0,"Error occurred while uploading to the database: ".$this->mysqli->error);
        }
        return $response;
    }

}