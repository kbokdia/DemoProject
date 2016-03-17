<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 03/02/16
 * Time: 6:24 AM
 */

namespace Project\events;

use Project\base\BaseClass;
use Project\base\Date;
use Zend\Http\PhpEnvironment\Request;
use Acme\Response;
use User\Models;
use Project\mediator;

define("ROOT", "../");
require ROOT."autoload.php";

$request = new Request();
$requestMethod = null;
$validate = true;
$response = null;
$authHeader = null;
$acmeRequest = null;
$configPath = "../db/Connection.php";
$data = [];

//Do validation if required
do{
    $authHeader = $request->getHeader('authorization');
    if(!$authHeader){
        $validate = false;
        $response = Response::createMessage("01");
        break;
    }

    $acmeRequest = new \Project\mediator\Request($configPath);
    $acmeRequest->authorize($authHeader);
    if(!$acmeRequest->isAuthorized){
        $validate = false;
        $response = $acmeRequest->getResponse();
        break;
    }

    $requestMethod = $request->getMethod();

    /*
     * Types (Whenever new types are defined update this comment too)
     * AE => Add event
     * DE => Delete event
     * GE => Get Events
     * UE => Update Events
     * LI => Logged in status
     */

    switch(strtoupper($requestMethod)){
        case 'AE':
            //validation
            //Todo-Ambuj Perform validation like check for name
            //if(empty($_POST['EventName']) || empty($_POST['EventDesc']) || empty($_POST['EventDate']) || empty($_POST['EventTime']) || empty($_POST['EventLocation']) || empty($_POST['EventDressCode'])) {
            $body = $request->getContent();
            if(!$body){
                $validate = false;
                $response = Response::createMessage("01");
                break;
            }

            $data = json_decode($body,true);
            if(!$data){
                $validate = false;
                $response = Response::createMessage("04");
                break;
            }
            if(empty($data["EventName"]) && empty($data["EventDesc"]) && empty($data["EventDate"]) && empty($data["EventTime"]) && empty($data["EventLocation"]) && empty($data["EventDressCode"])){
                $validate = false;
                $response = Response::createMessage("01");
                break;
            }
            break;
        case 'DE':
            //validation
            //if(empty($_POST['EventId']) ){
            $body = $request->getContent();
            if(!$body){
                $validate = false;
                $response = Response::createMessage("01");
                break;
            }

            $data = json_decode($body,true);
            if(!$data){
                $validate = false;
                $response = Response::createMessage("04");
                break;
            }

            if(empty($data["EventId"])){
                $validate = false;
                $response = Response::createMessage("01");
                break;
            }
            break;

        case 'UE':
            //validation
            $body = $request->getContent();
            if(!$body){
                $validate = false;
                $response = Response::createMessage("01");
                break;
            }

            $data = json_decode($body,true);
            if(!$data){
                $validate = false;
                $response = Response::createMessage("04");
                break;
            }

            if(empty($data["EventId"])){
                $validate = false;
                $response = Response::createMessage("01");
                break;
            }
            break;
    }

}while(0);

//Business Logic
if($validate){


    switch($requestMethod){
        case 'AE':
            //set mysql safe data
            $token = $acmeRequest->getToken();

            //set variables
            $user = new Models\User($token->data->regId,$token->data->userId,$token->data->userName);
            $controller = new Events($configPath,$user,$requestMethod,$data);
            //Perform action
            $response = $controller->addEvent();

            break;

        case 'DE':
            $token = $acmeRequest->getToken();
            //set variables
            $user = new Models\User($token->data->regId,$token->data->userId,$token->data->userName);
            $controller = new Events($configPath,$user,$requestMethod,$data);

            //Perform action
            $response = $controller->deleteEvent($data['eventId']);
            break;

        case 'UE':
            //set mysql safe data
            $token = $acmeRequest->getToken();

            //set variables
            $user = new Models\User($token->data->regId,$token->data->userId,$token->data->userName);
            $controller = new Events($configPath,$user,$requestMethod,$data);

            //Perform action
            $response = $controller->updateEvent($data['eventId']);
            break;

        case 'GE':
            $user = new Models\User($token->data->regId,$token->data->userId,$token->data->userName);
            $controller = new Events($configPath,$user,$requestMethod,$data);
            //Perform action
            $response = $controller->getEvent();
            break;

        case 'LI':
            $response = BaseClass::isAdmin();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
