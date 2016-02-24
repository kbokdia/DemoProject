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
            if(empty($_POST['Name']) || empty($_POST['Gender']) || empty($_POST['DOB'])  || empty($_POST['Email']) || empty($_POST['Mobile']) || empty($_POST['HasPartner']) || empty($_POST['HasChildren'])) {
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
            if(empty($_POST['RegId']) || empty($_POST['MemberId']) || empty($_POST['Name']) || empty($_POST['Gender']) || empty($_POST['DOB'])  || empty($_POST['Email']) || empty($_POST['Mobile']) || empty($_POST['HasPartner']) || empty($_POST['HasChildren']))
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
            $member->name = "'".$_POST['Name']."'";
            $member->guardianName = empty($_POST['GuardianName']) ? 'NULL' : "'".$_POST['GuardianName']."'";
            $member->dob = "'".$_POST['DOB']."'";
            $member->gender = intval($_POST['Gender']);
            $member->email = "'".$_POST['Email']."'";
            $member->email1 = empty($_POST['Email1']) ? 'NULL' : "'".$_POST['Email1']."'";
            $member->mobile = "'".$_POST['Mobile']."'";
            $member->mobile1 = empty($_POST['Mobile1']) ? 'NULL' : "'".$_POST['Mobile1']."'";
            $member->mobile2 = empty($_POST['Mobile2']) ? 'NULL' : "'".$_POST['Mobile2']."'";
            $member->bloodGroup = empty($_POST['BloodGroup']) ? 'NULL' : "'".$_POST['BloodGroup']."'";
            $member->nativePlace = empty($_POST['NativePlace']) ? 'NULL' : "'".$_POST['NativePlace']."'";
            $member->homeAddress = empty($_POST['HomeAddress']) ? 'NULL' : "'".$_POST['HomeAddress']."'";
            $member->homeAreaCode = empty($_POST['HomeAreaCode']) ? 'NULL' : "'".$_POST['HomeAreaCode']."'";
            $member->homePincode = empty($_POST['HomePincode']) ? 'NULL' : "'".$_POST['HomePincode']."'";
            $member->homeCityCode = empty($_POST['HomeCityCode']) ? 'NULL' : "'".$_POST['HomeCityCode']."'";
            $member->homeStateCode =empty( $_POST['HomeStateCode']) ? 'NULL' : "'".$_POST['HomeCityCode']."'";
            $member->homePhone = empty($_POST['HomePhone']) ? 'NULL' : "'".$_POST['HomePhone']."'";
            $member->homeCentrex = empty($_POST['HomeCentrex']) ? 'NULL' : "'".$_POST['HomeCentrex']."'";
            $member->occupation = empty($_POST['Occupation']) ? 'NULL' : "'".$_POST['Occupation']."'";
            $member->businessType = empty($_POST['BusinessType']) ? 'NULL' : "'".$_POST['BusinessType']."'";
            $member->officeAddress = empty($_POST['OfficeAddress']) ? 'NULL' : "'".$_POST['OfficeAddress']."'";
            $member->officeAreaCode = empty($_POST['OfficeAreaCode']) ? 'NULL' : "'".$_POST['OfficeAreaCode']."'";
            $member->officePincode = empty($_POST['OfficePincode']) ? 'NULL' : "'".$_POST['OfficePincode']."'";
            $member->officeCityCode = empty($_POST['OfficeCityCode']) ? 'NULL' : "'".$_POST['OfficeCityCode']."'";
            $member->officeStateCode = empty($_POST['OfficeStateCode']) ? 'NULL' : "'".$_POST['OfficeStateCode']."'";
            $member->officePhone = empty($_POST['OfficePhone']) ? 'NULL' : "'".$_POST['OfficePhone']."'";
            $member->officeCentrex = empty($_POST['OfficeCentrex']) ? 'NULL' : "'".$_POST['OfficeCentrex']."'";
            $member->food = empty($_POST['Food']) ? 'NULL' : "'".$_POST['Food']."'";
            $member->religion = empty($_POST['Religion']) ? 'NULL' : "'".$_POST['Religion']."'";
            $member->hobbies = empty($_POST['Hobbies']) ? 'NULL' : "'".$_POST['Hobbies']."'";
            $member->recognition = empty($_POST['Recognition']) ? 'NULL' : "'".$_POST['Recognition']."'";
            $member->membershipNo = empty($_POST['MembershipNo']) ? 'NULL' : "'".$_POST['MembershipNo']."'";
            $member->membershipType = empty($_POST['MembershipType']) ? 'NULL' : "'".$_POST['MembershipType']."'";
            $member->memberJoiningDate = empty($_POST['MemberJoiningDate']) ? 'NULL' : "'".$_POST['MemberJoiningDate']."'";
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
            $member->name = empty($_POST['Name']) ? 'NULL' : "'".$_POST['Name']."'";
            $member->guardianName = empty($_POST['GuardianName']) ? 'NULL' : "'".$_POST['GuardianName']."'";
            $member->dob = empty($_POST['DOB']) ? 'NULL' : "'".$_POST['DOB']."'";
            $member->gender = empty($_POST['Gender']) ? 0 : intval($_POST['Gender']);
            $member->email = empty($_POST['Email']) ? 'NULL' : "'".$_POST['Email']."'";
            $member->email1 = empty($_POST['Email1']) ? 'NULL' : "'".$_POST['Email1']."'";
            $member->mobile = empty($_POST['Mobile']) ? 'NULL' : "'".$_POST['Mobile']."'";
            $member->mobile1 = empty($_POST['Mobile1']) ? 'NULL' : "'".$_POST['Mobile1']."'";
            $member->mobile2 = empty($_POST['Mobile2']) ? 'NULL' : "'".$_POST['Mobile2']."'";
            $member->bloodGroup = empty($_POST['BloodGroup']) ? 'NULL' : "'".$_POST['BloodGroup']."'";
            $member->nativePlace = empty($_POST['NativePlace']) ? 'NULL' : "'".$_POST['NativePlace']."'";
            $member->homeAddress = empty($_POST['HomeAddress']) ? 'NULL' : "'".$_POST['HomeAddress']."'";
            $member->homeAreaCode = empty($_POST['HomeAreaCode']) ? 'NULL' : "'".$_POST['HomeAreaCode']."'";
            $member->homePincode = empty($_POST['HomePincode']) ? 'NULL' : "'".$_POST['HomePincode']."'";
            $member->homeCityCode = empty($_POST['HomeCityCode']) ? 'NULL' : "'".$_POST['HomeCityCode']."'";
            $member->homeStateCode =empty( $_POST['HomeStateCode']) ? 'NULL' : "'".$_POST['HomeCityCode']."'";
            $member->homePhone = empty($_POST['HomePhone']) ? 'NULL' : "'".$_POST['HomePhone']."'";
            $member->homeCentrex = empty($_POST['HomeCentrex']) ? 'NULL' : "'".$_POST['HomeCentrex']."'";
            $member->occupation = empty($_POST['Occupation']) ? 'NULL' : "'".$_POST['Occupation']."'";
            $member->businessType = empty($_POST['BusinessType']) ? 'NULL' : "'".$_POST['BusinessType']."'";
            $member->officeAddress = empty($_POST['OfficeAddress']) ? 'NULL' : "'".$_POST['OfficeAddress']."'";
            $member->officeAreaCode = empty($_POST['OfficeAreaCode']) ? 'NULL' : "'".$_POST['OfficeAreaCode']."'";
            $member->officePincode = empty($_POST['OfficePincode']) ? 'NULL' : "'".$_POST['OfficePincode']."'";
            $member->officeCityCode = empty($_POST['OfficeCityCode']) ? 'NULL' : "'".$_POST['OfficeCityCode']."'";
            $member->officeStateCode = empty($_POST['OfficeStateCode']) ? 'NULL' : "'".$_POST['OfficeStateCode']."'";
            $member->officePhone = empty($_POST['OfficePhone']) ? 'NULL' : "'".$_POST['OfficePhone']."'";
            $member->officeCentrex = empty($_POST['OfficeCentrex']) ? 'NULL' : "'".$_POST['OfficeCentrex']."'";
            $member->food = empty($_POST['Food']) ? 'NULL' : "'".$_POST['Food']."'";
            $member->religion = empty($_POST['Religion']) ? 'NULL' : "'".$_POST['Religion']."'";
            $member->hobbies = empty($_POST['Hobbies']) ? 'NULL' : "'".$_POST['Hobbies']."'";
            $member->recognition = empty($_POST['Recognition']) ? 'NULL' : "'".$_POST['Recognition']."'";
            $member->membershipNo = empty($_POST['MembershipNo']) ? 'NULL' : "'".$_POST['MembershipNo']."'";
            $member->membershipType = empty($_POST['MembershipType']) ? 'NULL' : "'".$_POST['MembershipType']."'";
            $member->memberJoiningDate = empty($_POST['MemberJoiningDate']) ? 'NULL' : "'".$_POST['MemberJoiningDate']."'";
            $member->hasPartner = empty($_POST['HasPartner']) ? 0 : intval($_POST['HasPartner']);
            $member->hasChildren = empty($_POST['HasChildren']) ? 0 : intval($_POST['HasChildren']);

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
