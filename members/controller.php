<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 23/02/16
 * Time: 12:24 PM
 */

namespace Project\members;

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
     * AM => Add member
     * DM => Delete member
     * GM => Get members
     * UM => Update member
     * LI => Logged in status.
     */

    switch($type){
        case 'AM':
            //validation
            if(empty($_POST['Name']) || empty($_POST['Gender']) || empty($_POST['Mobile']) || empty($_POST['HasPartner']) || empty($_POST['HasChildren'])) {
                $validate = false;
                $response = BaseClass::createResponse(0, "Invalid Request");
            }
            break;

        case 'DM':
            //validation
            if(empty($_POST['MemberId']) ){
                $validate = false;
                $response = BaseClass::createResponse(0,"Invalid Request");
            }
            break;

        case 'UM':
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
    $member = new Member();
    switch($type){
        case 'AM':
            //set mysql safe data
            $_POST = $member->escapeData($_POST);

            //set variables
            $member->name = $_POST['Name'];
            $member->guardianName = $_POST['GuardianName'];
            $member->dob = $_POST['DOB'];
            $member->gender = intval($_POST['Gender']);
            $member->email = $_POST['Email'];
            $member->email1 = $_POST['Email1'];
            $member->mobile = $_POST['Mobile'];
            $member->mobile1 = $_POST['Mobile1'];
            $member->mobile2 = $_POST['Mobile2'];
            $member->bloodGroup = $_POST['BloodGroup'];
            $member->nativePlace = $_POST['NativePlace'];
            $member->homeAddress = $_POST['HomeAddress'];
            $member->homeAreaCode = $_POST['HomeAreaCode'];
            $member->homePincode = $_POST['HomePincode'];
            $member->homeCityCode = $_POST['HomeCityCode'];
            $member->homeStateCode = $_POST['HomeStateCode'];
            $member->homePhone = $_POST['HomePhone'];
            $member->homeCentrex = $_POST['HomeCentrex'];
            $member->occupation = $_POST['Occupation'];
            $member->businessType = $_POST['BusinessType'];
            $member->officeAddress = $_POST['OfficeAddress'];
            $member->officeAreaCode = $_POST['OfficeAreaCode'];
            $member->officePincode = $_POST['OfficePincode'];
            $member->officeCityCode = $_POST['OfficeCityCode'];
            $member->officeStateCode = $_POST['OfficeStateCode'];
            $member->officePhone = $_POST['OfficePhone'];
            $member->officeCentrex = $_POST['OfficeCentrex'];
            $member->food = $_POST['Food'];
            $member->religion = $_POST['Religion'];
            $member->hobbies = $_POST['Hobbies'];
            $member->recognition = $_POST['Recognition'];
            $member->membershipNo = $_POST['MembershipNo'];
            $member->membershipType = $_POST['MembershipType'];
            $member->memberJoiningDate = $_POST['MemberJoiningDate'];
            $member->hasPartner = intval($_POST['HasPartner']);
            $member->hasChildren = intval($_POST['HasChildren']);

            //Perform action
            $response = $member->addMember();

            break;

        case 'DM':
            //set variables
            $memberId=intval($_POST["MemberId"]);

            //Perform action
            $response=$member->deleteMember($memberId);
            break;

        case 'UM':
            //set mysql safe data
            $_POST = $member->escapeData($_POST);

            //set variables
            $regId = intval($_POST['RegId']);
            $memberId = intval($_POST['MemberId']);
            $member->name = $_POST['Name'];
            $member->guardianName = $_POST['GuardianName'];
            $member->dob = $_POST['DOB'];
            $member->gender = intval($_POST['Gender']);
            $member->email = $_POST['Email'];
            $member->email1 = $_POST['Email1'];
            $member->mobile = $_POST['Mobile'];
            $member->mobile1 = $_POST['Mobile1'];
            $member->mobile2 = $_POST['Mobile2'];
            $member->bloodGroup = $_POST['BloodGroup'];
            $member->nativePlace = $_POST['NativePlace'];
            $member->homeAddress = $_POST['HomeAddress'];
            $member->homeAreaCode = $_POST['HomeAreaCode'];
            $member->homePincode = $_POST['HomePincode'];
            $member->homeCityCode = $_POST['HomeCityCode'];
            $member->homeStateCode = $_POST['HomeStateCode'];
            $member->homePhone = $_POST['HomePhone'];
            $member->homeCentrex = $_POST['HomeCentrex'];
            $member->occupation = $_POST['Occupation'];
            $member->businessType = $_POST['BusinessType'];
            $member->officeAddress = $_POST['OfficeAddress'];
            $member->officeAreaCode = $_POST['OfficeAreaCode'];
            $member->officePincode = $_POST['OfficePincode'];
            $member->officeCityCode = $_POST['OfficeCityCode'];
            $member->officeStateCode = $_POST['OfficeStateCode'];
            $member->officePhone = $_POST['OfficePhone'];
            $member->officeCentrex = $_POST['OfficeCentrex'];
            $member->food = $_POST['Food'];
            $member->religion = $_POST['Religion'];
            $member->hobbies = $_POST['Hobbies'];
            $member->recognition = $_POST['Recognition'];
            $member->membershipNo = $_POST['MembershipNo'];
            $member->membershipType = $_POST['MembershipType'];
            $member->memberJoiningDate = $_POST['MemberJoiningDate'];
            $member->hasPartner = intval($_POST['HasPartner']);
            $member->hasChildren = intval($_POST['HasChildren']);

            //Perform action
            $response=$member->updateMember($regId,$memberId);
            break;

        case 'GM':
            //Perform action
            $regId = $_POST['RegId'];
            $memberId = $_POST['MemberId'];
            $response=$member->getMember($regId,$memberId);
            break;

        case 'LI':
            $response = BaseClass::isAdmin();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
