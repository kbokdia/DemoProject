<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 20/02/16
 * Time: 3:08 PM
 */

namespace Project\members;


use Project\base\BaseClass;

class Member extends BaseClass
{
    //Declare the variables.
    var $memberId;
    var $name;
    var $guardianName;
    var $dob;
    var $gender;
    var $email;
    var $email1;
    var $mobile;
    var $mobile1;
    var $mobile2;
    var $bloodGroup;
    var $nativePlace;
    var $homeAddress;
    var $homeAreaCode;
    var $homePincode;
    var $homeCityCode;
    var $homeStateCode;
    var $homePhone;
    var $homeCentrex;
    var $occupation;
    var $businessType;
    var $officeAddress;
    var $officeAreaCode;
    var $officePincode;
    var $officeCityCode;
    var $officeStateCode;
    var $officePhone;
    var $officeCentrex;
    var $food;
    var $religion;
    var $hobbies;
    var $recognition;
    var $membershipNo;
    var $membershipType;
    var $memberJoiningDate;
    var $hasPartner;
    var $active;

    function __construct(){
        parent::__construct();
    }

    //Add new member.
    function addMember()
    {
        $this->memberId=$this->generateMemberId();
        $sql = "INSERT INTO Members (MemberId,Name,GuardianName,DOB,Gender,Email,Email1,Mobile,Mobile1,Mobile2,BloodGroup,NativePlace,HomeAddress,HomeAreaCode,HomePincode,HomeCityCode,HomeStateCode,HomePhone,HomeCentrex,Occupation,BusinessType,OfficeAddress,OfficeAreaCode,OfficePincode,OfficeCityCode,OfficeStateCode,OfficePhone,OfficeCentrex,Food,Religion,Hobbies,Recognition,MembershipNo,MembershipType,MemberJoiningDate,HasPartner,Active) VALUES ($this->memberId,'$this->name','$this->guardianName','$this->dob',$this->gender,'$this->email','$this->email1','$this->mobile','$this->mobile2','$this->mobile2','$this->bloodGroup','$this->nativePlace','$this->homeAddress','$this->homeAreaCode','$this->homePincode','$this->homeCityCode','$this->homeStateCode','$this->homePhone','$this->homeCentrex','$this->occupation','$this->businessType','$this->officeAddress','$this->officeAreaCode','$this->officePincode','$this->officeCityCode','$this->officeStateCode','$this->officePhone','$this->officeCentrex','$this->food','$this->religion','$this->hobbies','$this->recognition','$this->membershipNo','$this->membershipType','$this->memberJoiningDate',$this->hasPartner,$this->active )";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Member added..");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;

    }


    //Get members details.
    function getMember($memberId,$regId)
    {
        $sql = "SELECT * FROM Members WHERE RegId=$regId AND MemberId=$memberId";
        $result = $this->mysqli->query($sql);
        if ($result) {
            $i = 0;
            $response = BaseClass::createResponse(1,"Success");
            $response['result'] = array();
            while ($row = $result->fetch_assoc()) {
                $response['result'][$i++] = $row;
            }
        } else {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }


    //Edit the member details.
    function updateMember($regId,$memberId)
    {
        $sql = "UPDATE Members SET Name='$this->name',GuardianName='$this->guardianName',DOB='$this->dob',Gender=$this->gender,Email='$this->email',Email1='$this->email1',Mobile='$this->mobile',Mobile1='$this->mobile1',Mobile2='$this->mobile2',BloodGroup='$this->bloodGroup',NativePlace='$this->nativePlace',HomeAddress='$this->homeAddress',HomeAreaCode='$this->homeAreaCode',HomePincode='$this->homePincode',HomeCityCode'$this->homeCityCode',HomeStateCode='$this->homeStateCode',HomePhone='$this->homePhone',HomeCentrex='$this->homeCentrex',Occupation='$this->occupation',BusinessType='$this->businessType',OfficeAddress='$this->officeAddress',OfficeAreaCode='$this->officeAreaCode',OfficePincode='$this->officePincode',OfficeCityCode='$this->officeCityCode',OfficeStateCode='$this->officeStateCode',OfficePhone='$this->officePhone',OfficeCentrex='$this->officeCentrex',Food='$this->food',Religion='$this->religion',Hobbies='$this->hobbies',Recognition='$this->recognition',MembershipNo='$this->membershipNo',MembershipType='$this->membershipType',MemberJoiningDate='$this->memberJoiningDate',HasPartner=$this->hasPartner, Active=$this->active WHERE RegId=$regId AND MemberId=$memberId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Member details updated..");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;

    }


    //Delete the member.
    function deleteMember($memberId)
    {
        $sql = "DELETE FROM Members WHERE RegId = $this->regId AND MemberId=$memberId";
        if($this->mysqli->query($sql)){
            $response = BaseClass::createResponse(1,"Member deleted");
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }

        return $response;

    }


    //Generate the member ID for new members..
    function generateMemberId()
    {
        $memberCode = 1001;
        $sql = "SELECT MAX(MemberId) AS 'memberCode' FROM Members WHERE RegId = $this->regId";
        if($result = $this->mysqli->query($sql))
        {
            $memberCode = intval($result->fetch_assoc()['memberCode']);
            $memberCode = (($memberCode == 0) ? 1001 : $memberCode + 1);
        }
        return $memberCode;
    }



}