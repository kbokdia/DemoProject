<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 03/02/16
 * Time: 6:24 AM
 */

namespace Project\events;

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
     * AE => Add event
     * DE => Delete event
     * GE => Get Events
     * UE => Update Events
     */

    switch($type){
        case 'AE':
            //validation
            //Todo-Ambuj Perform validation like check for name
            break;

        case 'DE':
            //validation
            if(empty($_POST['EventId']) ){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;

        case 'UE':
            //validation
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
    $events = new Events();

    switch($type){
        case 'AE':
            //set mysql safe data
            $_POST = $events->escapeData($_POST);

            //set variables


            //Perform action

            break;

        case 'DE':
            //set variables


            //Perform action
            break;

        case 'UE':
            //set mysql safe data
            $_POST = $events->escapeData($_POST);

            //set variables


            //Perform action
            break;

        case 'GE':
            //Perform action
            break;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
