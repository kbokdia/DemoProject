<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 23/02/16
 * Time: 2:58 PM
 */

namespace Project\spouse\spouse;


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
     * AS => Add spouse
     * DS => Delete spouse
     * GS => Get spouse
     * US => Update spouse
     * LI => Logged in status.
     */

    switch($type){
        case 'AS':
            //validation
            if(empty($_POST['Name']) || empty($_POST['DOB']) || empty($_POST['Gender']) || empty($_POST['Mobile'])) {
                $validate = false;
                $response = BaseClass::createResponse(0, "Invalid Request");
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
            $memberId=intval($_POST["memberId"]);

            //Perform action
            $response=$spouse->deleteSpouse($memberId);
            break;

        case 'US':
            //set mysql safe data
            $_POST = $spouse->escapeData($_POST);

            //set variables
            $regId = intval($_POST['RegId']);
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
            $response=$spouse->updateSpouse($regId,$memberId);
            break;

        case 'GS':
            //Perform action
            $regId = $_POST['RegId'];
            $memberId = $_POST['MemberId'];
            $response=$spouse->getSpouse($memberId,$regId);
            break;

        case 'LI':
            $response = BaseClass::isAdmin();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
