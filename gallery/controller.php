<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 25/01/16
 * Time: 7:49 PM
 */

namespace Project\gallery;

use Project\base\BaseClass;

define("ROOT", "../");
require ROOT."autoload.php";

$response = null;
$validate = true;
$type = null;

//Do validation if required
do{
    if(empty($_GET['type'])){
        $validate = false;
        $response = BaseClass::createResponse(0,"Invalid Request");
        break;
    }
    $type = strtoupper($_GET['type']);

    /*
     * Types (Whenever new types are defined update this comment too)
     * AG => Add gallery
     * DG => Delete Gallery
     * AI => Add Image
     * DI => Delete Image
     * DM => Delete Multiple Image
     * GG => Get Galleries
     * GI => Get Gallery Info
     * LI => Logged in state
     * EXAMPLE : T => test*/

    switch($type){
        case 'AG':
            if(empty($_POST['GalleryName']) || empty($_POST['GalleryDescription']) || !isset($_FILES['fileToUpload']) || !BaseClass::isAdmin()){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;

        case 'DG':
            if(empty($_POST['GalleryId']) || !BaseClass::isAdmin()){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;

        case 'AI':
            if(empty($_POST['GalleryId']) || !isset($_FILES['fileToUpload']) || !BaseClass::isAdmin()){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;

        case 'DI':
            if(empty($_POST['GalleryId']) || empty($_POST['ImageId']) || !BaseClass::isAdmin() ){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;

        case 'DM':
            if(empty($_POST['GalleryId']) || empty($_POST['ImageId']) || !BaseClass::isAdmin()){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            else{
                if(!is_array($_POST['ImageId'])){
                    $validate = false;
                    $response = BaseClass::createResponse(0,"Invalid Request");
                }
            }
            break;

        case 'GI':
            if(empty($_GET['GalleryId']))
            {
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
        break;
    }

}while(0);

//Business Logic
if($validate){
    $gallery = new Gallery();

    switch($type){
        case 'AG':
            //set mysql safe data
            $_POST = $gallery->escapeData($_POST);

            //set variables
            $gallery->galleryName = $_POST['GalleryName'];
            $gallery->galleryDescription = $_POST['GalleryDescription'];
            $gallery->coverImage = $_FILES['fileToUpload'];

            //Perform action
            $response = $gallery->saveGalleryInfo();
            break;

        case 'DG':
            //Perform action
            $galleryId = intval($_POST['GalleryId']);
            $response = $gallery->deleteGallery($galleryId);
            break;

        case 'AI':
            $files = array();
            //set variables
            foreach ($_FILES['fileToUpload'] as $k => $l) {
                foreach ($l as $i => $v) {
                    if (!array_key_exists($i, $files))
                        $files[$i] = array();
                    $files[$i][$k] = $v;
                }
            }
            $gallery->images = $files;
            $galleryId = intval($_POST['GalleryId']);

            //Perform action
            $response = $gallery->saveGalleryImage($galleryId);
            break;

        case 'DI':
            $galleryId = intval($_POST['GalleryId']);
            $imageId = $_POST['ImageId'];
            $response = $gallery->deleteGalleryImage($galleryId,$imageId);
            break;

        case 'DM':
            $galleryId = intval($_POST['GalleryId']);
            $imageIds = $_POST['ImageId'];
            $response = $gallery->deleteMultipleImages($galleryId,$imageIds);
            break;

        case 'GG':
            $response = $gallery->getGalleries();
            break;

        case 'GI':
            $galleryId = intval($_GET['GalleryId']);
            $response = $gallery->getGalleryInfo($galleryId);
            break;

        case 'LI':
            $response = BaseClass::isAdmin();

    }
}

header('Content-Type: application/json');
echo json_encode($response);
