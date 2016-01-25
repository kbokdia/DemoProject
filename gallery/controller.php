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

//Do validation if required
do{
    if(empty($_GET['type'])){
        $validate = false;
        $response = BaseClass::createResponse(0,"Invalid Request");
        break;
    }

    /*
     * Types (Whenever new types are defined update this comment too)
     * AG => Add gallery
     * DG => Delete Gallery
     * AI => Add Image
     * DI => Delete Image
     * EXAMPLE : T => test*/

}while(0);


//Business Logic
if($validate){
    $gallery = new Gallery();
    $type = strtoupper($_GET['type']);

    switch($type){
        case 'T':
            $gallery->galleryName = "Test";
            $response = $gallery->test();
            break;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
