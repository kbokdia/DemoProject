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
            if(empty($_POST['MemberId']) || empty($_POST['RegId']) || empty($_POST['Name']) || empty($_POST['DOB']) || empty($_POST['Gender'])) {
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
            $children->name = "'".$_POST['Name']."'";
            $children->dob =  "'".$_POST['DOB']."'";
            $children->gender = intval($_POST['Gender']);
            $children->email =  empty($_POST['Email']) ? 'NULL' : "'".$_POST['Email']."'";
            $children->email1 =  empty($_POST['Email1']) ? 'NULL' : "'".$_POST['Email1']."'";
            $children->mobile =  empty($_POST['Mobile']) ? 'NULL' : "'".$_POST['Mobile']."'";
            $children->mobile1 =  empty($_POST['Mobile1']) ? 'NULL' : "'".$_POST['Mobile1']."'";
            $children->mobile2 =  empty($_POST['Mobile2']) ? 'NULL' : "'".$_POST['Mobile2']."'";
            $children->bloodGroup =  empty($_POST['BloodGroup']) ? 'NULL' : "'".$_POST['BloodGroup']."'";
            $children->hobbies =  empty($_POST['Hobbies']) ? 'NULL' : "'".$_POST['Hobbies']."'";

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
            $children->name = empty($_POST['Name']) ? 'NULL' : "'".$_POST['Name']."'";
            $children->dob =  empty($_POST['DOB']) ? 'NULL' : "'".$_POST['DOB']."'";
            $children->gender = empty($_POST['Gender']) ? 0 : intval($_POST['Gender']);
            $children->email =  empty($_POST['Email']) ? 'NULL' : "'".$_POST['Email']."'";
            $children->email1 =  empty($_POST['Email1']) ? 'NULL' : "'".$_POST['Email1']."'";
            $children->mobile =  empty($_POST['Mobile']) ? 'NULL' : "'".$_POST['Mobile']."'";
            $children->mobile1 =  empty($_POST['Mobile1']) ? 'NULL' : "'".$_POST['Mobile1']."'";
            $children->mobile2 =  empty($_POST['Mobile2']) ? 'NULL' : "'".$_POST['Mobile2']."'";
            $children->bloodGroup =  empty($_POST['BloodGroup']) ? 'NULL' : "'".$_POST['BloodGroup']."'";
            $children->hobbies =  empty($_POST['Hobbies']) ? 'NULL' : "'".$_POST['Hobbies']."'";

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

