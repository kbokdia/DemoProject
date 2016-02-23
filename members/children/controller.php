<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 23/02/16
 * Time: 3:27 PM
 */

namespace Project\members\children;


use Project\base\BaseClass;
use Project\members\Member;

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
     * AC => Add children
     * DC => Delete children
     * GC => Get children
     * UC => Update children
     * LI => Logged in status.
     */

    switch($type){
        case 'AC':
            //validation
            if(empty($_POST['MemberId']) || empty($_POST['RegId']) || empty($_POST['Name']) || empty($_POST['DOB']) || empty($_POST['Gender']) || empty($_POST['Mobile'])) {
                $validate = false;
                $response = BaseClass::createResponse(0, "Invalid Request");
                break;
            }
            $member = new Member();
            if(!$member->isMember($_POST['MemberId']))
            {
                $response = BaseClass::createResponse(0, "Member ID does not exist.");
            }
            break;

        case 'DC':
            //validation
            if(empty($_POST['MemberId']) ){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;

        case 'UC':
            //validation
            if(empty($_POST['RegId']) || empty($_POST['MemberId']) || empty($_POST['KidId']))
            {
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;
    }

}while(0);

//Business Logic
if($validate){
    $children = new Children();
    switch($type){
        case 'AC':
            //set mysql safe data
            $_POST = $children->escapeData($_POST);

            //set variables
            $memberId = intval($_POST['MemberId']);
            $regId = intval($_POST['RegId']);
            $children->name = $_POST['Name'];
            $children->dob = $_POST['DOB'];
            $children->gender = intval($_POST['Gender']);
            $children->email = $_POST['Email'];
            $children->email1 = $_POST['Email1'];
            $children->mobile = $_POST['Mobile'];
            $children->mobile1 = $_POST['Mobile1'];
            $children->mobile2 = $_POST['Mobile2'];
            $children->bloodGroup = $_POST['BloodGroup'];
            $children->hobbies = $_POST['Hobbies'];

            //Perform action
            $response = $children->addChildren($memberId,$regId);

            break;

        case 'DC':
            //set variables
            $memberId = intval($_POST["MemberId"]);
            $kidId = intval($_POST['KidId']);

            //Perform action
            $response=$children->deleteChildren($memberId,$kidId);
            break;

        case 'UC':
            //set mysql safe data
            $_POST = $children->escapeData($_POST);

            //set variables
            $regId = intval($_POST['RegId']);
            $memberId = intval($_POST['MemberId']);
            $kidId = intval($_POST['KidId']);
            $children->name = $_POST['Name'];
            $children->dob = $_POST['DOB'];
            $children->gender = intval($_POST['Gender']);
            $children->email = $_POST['Email'];
            $children->email1 = $_POST['Email1'];
            $children->mobile = $_POST['Mobile'];
            $children->mobile1 = $_POST['Mobile1'];
            $children->mobile2 = $_POST['Mobile2'];
            $children->bloodGroup = $_POST['BloodGroup'];
            $children->hobbies = $_POST['Hobbies'];

            //Perform action
            $response=$children->updateChildren($regId,$memberId,$kidId);
            break;

        case 'GC':
            //Perform action
            $regId = intval($_POST['RegId']);
            $memberId = intval($_POST['MemberId']);
            $kidId = intval($_POST['KidId']);
            $response=$children->getChildren($memberId,$regId,$kidId);
            break;

        case 'LI':
            $response = BaseClass::isAdmin();
    }
}

header('Content-Type: application/json');
echo json_encode($response);

