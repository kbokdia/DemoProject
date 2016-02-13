<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 13/02/16
 * Time: 1:33 PM
 */
namespace Project\events\rsvp;

use Project\base\BaseClass;

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
      * AR => Add RSVP.
      * GR => Get RSVP.
      * UR => Update RSVP.
      * DR => Delete RSVP.
      */
    switch($type)
    {
        case 'AR':
            if(empty($_POST['Self']) || empty($_POST['Spouse']) || empty($_POST['Children']) || empty($_POST['Guest']))
            {
                $validate = false;
                $response = BaseClass::createResponse(0, "Invalid Request");
            }
            break;

        case 'UR':
            if(empty($_POST['RegId']) || empty($_POST['EventId']) || empty($_POST['MemberId']))
            {
                $validate = false;
                $response = BaseClass::createResponse(0, "Invalid Request");
            }
            break;

        case 'DR':
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
        case 'AR':
            $_POST = $rsvp->escapeData($_POST);

            $rsvp->self=intval($_POST['Self']);
            $rsvp->spouse=intval($_POST['Spouse']);
            $rsvp->children=intval($_POST['Children']);
            $rsvp->guest=intval($_POST['Guest']);
            $response = $rsvp->addRsvp();

            break;

        case 'UR':
            $_POST = $rsvp->escapeData($_POST);

            $rsvp->self=intval($_POST['Self']);
            $rsvp->spouse=intval($_POST['Spouse']);
            $rsvp->children=intval($_POST['Children']);
            $rsvp->guest=intval($_POST['Guest']);
            $response = $rsvp->updateRsvp();
    }




}
