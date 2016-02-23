<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 13/02/16
 * Time: 1:33 PM
 */
namespace Project\events\rsvp;

use Project\base\BaseClass;

define("ROOT", "../../");
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
      * ARP => Add RSVP.
      * GRP => Get RSVP.
      * URP => Update RSVP.
      * DRP => Delete RSVP.
      */
    switch($type)
    {
        case 'ARP':
            if(empty($_POST['Self']) || empty($_POST['Spouse']) || empty($_POST['Children']) || empty($_POST['Guest']))
            {
                $validate = false;
                $response = BaseClass::createResponse(0, "Invalid Request");
            }
            break;

        case 'URP':
            if(empty($_POST['RegId']) || empty($_POST['EventId']) || empty($_POST['MemberId']))
            {
                $validate = false;
                $response = BaseClass::createResponse(0, "Invalid Request");
            }
            break;

        case 'DRP':
            if(empty($_POST['RegId']) || empty($_POST['EventId']) || empty($_POST['MemberId']))
            {
                $validate = false;
                $response = BaseClass::createResponse(0, "Invalid Request");
            }
            break;
    }
}while(0);

//Business Logic
if($validate) {
    $rsvp = new Rsvp();

    switch($type){
        //Add RSVP.
        case 'ARP':
            $_POST = $rsvp->escapeData($_POST);

            $regId=intval($_POST['regId']);
            $eventId=intval($_POST['eventId']);
            $memberId=intval($_POST['memberId']);

            $rsvp->self=intval($_POST['Self']);
            $rsvp->spouse=intval($_POST['Spouse']);
            $rsvp->children=intval($_POST['Children']);
            $rsvp->guest=intval($_POST['Guest']);
            $response = $rsvp->addRsvp($regId,$eventId,$memberId);

            break;

        //Update RSVP.
        case 'URP':
            $_POST = $rsvp->escapeData($_POST);

            $regId=intval($_POST['regId']);
            $eventId=intval($_POST['eventId']);
            $memberId=intval($_POST['memberId']);

            $rsvp->self=intval($_POST['Self']);
            $rsvp->spouse=intval($_POST['Spouse']);
            $rsvp->children=intval($_POST['Children']);
            $rsvp->guest=intval($_POST['Guest']);
            $response = $rsvp->updateRsvp($regId,$eventId,$memberId);

            break;

        //Delete RSVP.
        case 'DRP':
            $_POST = $rsvp->escapeData($_POST);

            $eventId=intval($_POST['eventId']);
            $memberId=intval($_POST['memberId']);

            $response = $rsvp->deleteMemberRsvp($eventId,$memberId);

            break;

        //Get RSVP.
        case 'GRP':
            $eventId=intval($_POST['eventId']);
            $response = $rsvp->getRsvp($eventId);

            break;
    }
}
header('Content-Type: application/json');
echo json_encode($response);
