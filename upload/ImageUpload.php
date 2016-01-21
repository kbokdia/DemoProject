<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 30/11/15
 * Time: 8:35 AM
 */

namespace Project\Upload;


class ImageUpload
{
    //$_FILE arr
    var $file;

    //destination path
    var $dstPath;

    //destination name
    var $dstName;

    //default file image size
    var $fileSize = 10485760;

    //default extensions
    var $extensions = array("jpeg","jpg","png","gif");

    //default file extension
    var $fileExtension = "jpg";

    //current file extension
    var $currentExtension;

    //image upload response
    var $response;

    //flag to check if all things are fine
    var $success = true;

    function __construct($file){
        $this->file = $file;
        $this->checkFileSize();
        $this->checkFileExtension();
    }

    private function checkFileSize(){
        if($this->file["size"] > $this->fileSize){
            $this->success = false;
            $this->response = $this->createResponse(0,"File size is greater than ". round($this->fileSize / (1024 * 1024)) . " MB");
        }
    }

    private function checkFileExtension(){
        $fileName = explode('.',$this->file['name']);
        $fileExt = strtolower(end($fileName));
        if(in_array($fileExt,$this->extensions) === false){
            $this->success = false;
            $this->response = $this->createResponse(0,"Only these ". implode(",",$this->extensions)." are allowed");
        }
        $this->currentExtension = $fileExt;
    }

    private function checkDestinationPath(){
        if(!file_exists($this->dstPath)){
            $this->success = false;
            $this->response = $this->createResponse(0,"Destination path does not exists");
        }
    }

    private function getImage(){
        $image = imagecreatefromstring(file_get_contents($this->file['tmp_name']));
        if($this->currentExtension == 'jpg' || $this->currentExtension == 'jpeg'){
            $exif = exif_read_data($this->file['tmp_name']);
            if(!empty($exif['Orientation'])) {
                switch($exif['Orientation']) {
                    case 8:
                        $image = imagerotate($image,90,0);
                        break;
                    case 3:
                        $image = imagerotate($image,180,0);
                        break;
                    case 6:
                        $image = imagerotate($image,-90,0);
                        break;
                }
            }
        }

        return $image;
    }


    function save(){
        $this->checkDestinationPath();
        if($this->success){
            $im = $this->getImage();

            //save image as jpg
            if(imagejpeg($im,$this->dstPath.$this->dstName.".jpg")){
                $this->success = true;
                $this->response = $this->createResponse(1,"Image uploaded successfully");
            }

            //free up the memory
            imagedestroy($im);
        }

        return $this->success;
    }

    function createResponse($status,$message){
        return array('status' => $status, 'message' => $message);
    }
}