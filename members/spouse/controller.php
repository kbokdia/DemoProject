<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 23/02/16
 * Time: 2:58 PM
 */

namespace Project\members\spouse;


use Project\base\BaseClass;
use Project\members\Member;

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
     * AS => Add spouse
     * DS => Delete spouse
     * GS => Get spouse
     * US => Update spouse
     * LI => Logged in status.
     */

    switch($type){
        case 'AS':
            //validation
            if(empty($_POST['MemberId']) || empty($_POST['Name']) || empty($_POST['DOB']) || empty($_POST['Gender']) || empty($_POST['Mobile']) || empty($_POST['Email'])) {
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

        case 'DS':
            //validation
            if(empty($_POST['MemberId']) ){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;

        case 'US':
            //validation
            if(empty($_POST['RegId']) || empty($_POST['MemberId']))
            {
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;
    }

}while(0);

//Business Logic
if($validate){
    $spouse = new Spouse();
    switch($type){
        case 'AS':
            //set mysql safe data
            $_POST = $spouse->escapeData($_POST);

            //set variables
            $memberId = intval($_POST['MemberId']);
            $spouse->name = $_POST['Name'];
            $spouse->dob = $_POST['DOB'];
            $spouse->gender = intval($_POST['Gender']);
            $spouse->email = $_POST['Email'];
            $spouse->email1 = $_POST['Email1'];
            $spouse->mobile = $_POST['Mobile'];
            $spouse->mobile1 = $_POST['Mobile1'];
            $spouse->mobile2 = $_POST['Mobile2'];
            $spouse->bloodGroup = $_POST['BloodGroup'];
            $spouse->occupation = $_POST['Occupation'];
            $spouse->businessType = $_POST['BusinessType'];
            $spouse->officeAddress = $_POST['OfficeAddress'];
            $spouse->officeAreaCode = $_POST['OfficeAreaCode'];
            $spouse->officePincode = $_POST['OfficePincode'];
            $spouse->officeCityCode = $_POST['OfficeCityCode'];
            $spouse->officeStateCode = $_POST['OfficeStateCode'];
            $spouse->officePhone = $_POST['OfficePhone'];
            $spouse->officeCentrex = $_POST['OfficeCentrex'];
            $spouse->hobbies = $_POST['Hobbies'];
            $spouse->recognition = $_POST['Recognition'];


            //Perform action
            $response = $spouse->addSpouse($memberId);

            break;

        case 'DS':
            //set variables
            $memberId=intval($_POST["MemberId"]);

            //Perform action
            $response=$spouse->deleteSpouse($memberId);
            break;

        case 'US':
            //set mysql safe data
            $_POST = $spouse->escapeData($_POST);

            //set variables
            $regId = intval($_POST['RegId']);
            $memberId = intval($_POST['MemberId']);
            $spouse->name = empty($_POST['Name']) ? 'NULL' : "'".$_POST['Name']."'";
            $spouse->dob = empty($_POST['DOB']) ? 'NULL' : "'".$_POST['DOB']."'";
            $spouse->gender = intval($_POST['Gender']);
            $spouse->email = empty($_POST['Email']) ? 'NULL' : "'".$_POST['Email']."'";
            $spouse->email1 = empty($_POST['Email1']) ? 'NULL' : "'".$_POST['Email1']."'";
            $spouse->mobile = empty($_POST['Mobile']) ? 'NULL' : "'".$_POST['Mobile']."'";
            $spouse->mobile1 = empty($_POST['Mobile1']) ? 'NULL' : "'".$_POST['Mobile1']."'";
            $spouse->mobile2 = empty($_POST['Mobile2']) ? 'NULL' : "'".$_POST['Mobile2']."'";
            $spouse->bloodGroup = empty($_POST['BloodGroup']) ? 'NULL' : "'".$_POST['BloodGroup']."'";
            $spouse->occupation = empty($_POST['Occupation']) ? 'NULL' : "'".$_POST['Occupation']."'";
            $spouse->businessType = empty($_POST['BusinessType']) ? 'NULL' : "'".$_POST['BusinessType']."'";
            $spouse->officeAddress = empty($_POST['OfficeAddress']) ? 'NULL' : "'".$_POST['OfficeAddress']."'";
            $spouse->officeAreaCode = empty($_POST['OfficeAreaCode']) ? 'NULL' : "'".$_POST['OfficeAreaCode']."'";
            $spouse->officePincode = empty($_POST['OfficePincode']) ? 'NULL' : "'".$_POST['OfficePincode']."'";
            $spouse->officeCityCode = empty($_POST['OfficeCityCode']) ? 'NULL' : "'".$_POST['OfficeCityCode']."'";
            $spouse->officeStateCode = empty($_POST['OfficeStateCode']) ? 'NULL' : "'".$_POST['OfficeStateCode']."'";
            $spouse->officePhone = empty($_POST['OfficePhone']) ? 'NULL' : "'".$_POST['OfficePhone']."'";
            $spouse->officeCentrex = empty($_POST['OfficeCentrex']) ? 'NULL' : "'".$_POST['OfficeCentrex']."'";
            $spouse->hobbies = empty($_POST['Hobbies']) ? 'NULL' : "'".$_POST['Hobbies']."'";
            $spouse->recognition = empty($_POST['Recognition']) ? 'NULL' : "'".$_POST['Recognition']."'";

            //Perform action
            $response=$spouse->updateSpouse($regId,$memberId);
            break;

        case 'GS':
            //Perform action
            $regId = intval($_POST['RegId']);
            $memberId = intval($_POST['MemberId']);
            $response=$spouse->getSpouse($memberId,$regId);
            break;

        case 'LI':
            $response = BaseClass::isAdmin();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
