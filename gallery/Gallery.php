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

    function test(){
        $gallID=$this->generateGalleryId();
        $path = "albums/$this->galleryName";
        $imagePath = $path."/".$gallID.".jpg";

        $sql="INSERT INTO Gallery(Id, GalleryName, ImageCount, CoverImagePath) VALUES ($gallID,'$this->galleryName',0,'$imagePath')";

        if($this->mysqli->query($sql)){
            $response = BaseClass::createResponse(1,"Record Inserted");
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }

        return $response;
    }

    //save gallery info
    function saveGalleryInfo(){
        /*todo-ambuj
            save cover file in folder "albums/<gallery-name>/cover.jpg"
            To upload file use ImageUpload class
            create insert query and save to db and on success return true else false
        */

        //Ambuj
        $response = array();

        //Check if gallery exists.
        $sql="select GalleryName from Gallery where GalleryName = '$this->galleryName'";
        $result = $this->mysqli->query($sql);
        if($result){
            //Get an id for the new gallery.
            $gallID=$this->generateGalleryId();

            $path = "albums/".$gallID."/";
            if($result->num_rows == 0){
                //If not,then create directory and move image.
                if(!file_exists($path)){
                    mkdir($path);
                    mkdir($path."/SD");
                    mkdir($path."/Thumbs");
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
            }
            else{
                $response = BaseClass::createResponse(0,"Gallery already exists..");
            }
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
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
    function getScaledDimArray($img,$max_w = 245, $max_h = 170){
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