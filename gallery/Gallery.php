<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 22/01/16
 * Time: 1:14 PM
 */

namespace Project\gallery;


use Project\base\BaseClass;

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
        //create insert query and save to db and on success return true else false
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
}