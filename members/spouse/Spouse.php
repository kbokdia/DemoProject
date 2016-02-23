<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 23/02/16
 * Time: 11:01 AM
 */

namespace Project\members\spouse;


use Project\base\BaseClass;

class Spouse extends BaseClass
{
    var $memberId;
    var $name;
    var $dob;
    var $gender;
    var $email;
    var $email1;
    var $mobile;
    var $mobile1;
    var $mobile2;
    var $bloodGroup;
    var $occupation;
    var $businessType;
    var $officeAddress;
    var $officeAreaCode;
    var $officePincode;
    var $officeCityCode;
    var $officeStateCode;
    var $officePhone;
    var $officeCentrex;
    var $hobbies;
    var $recognition;

    function __construct(){
        parent::__construct();
    }

    //Add a new spouse.
    function addSpouse()
    {
        $this->memberId=$this->generateMemberId();
        $sql = "INSERT INTO Members (MemberId,Name,GuardianName,DOB,Gender,Email,Email1,Mobile,Mobile1,Mobile2,BloodGroup,NativePlace,HomeAddress,HomeAreaCode,HomePincode,HomeCityCode,HomeStateCode,HomePhone,HomeCentrex,Occupation,BusinessType,OfficeAddress,OfficeAreaCode,OfficePincode,OfficeCityCode,OfficeStateCode,OfficePhone,OfficeCentrex,Food,Religion,Hobbies,Recognition,MembershipNo,MembershipType,MemberJoiningDate,HasPartner,Active) VALUES ($this->memberId,'$this->name','$this->guardianName','$this->dob',$this->gender,'$this->email','$this->email1','$this->mobile','$this->mobile2','$this->mobile2','$this->bloodGroup','$this->nativePlace','$this->homeAddress','$this->homeAreaCode','$this->homePincode','$this->homeCityCode','$this->homeStateCode','$this->homePhone','$this->homeCentrex','$this->occupation','$this->businessType','$this->officeAddress','$this->officeAreaCode','$this->officePincode','$this->officeCityCode','$this->officeStateCode','$this->officePhone','$this->officeCentrex','$this->food','$this->religion','$this->hobbies','$this->recognition','$this->membershipNo','$this->membershipType','$this->memberJoiningDate',$this->hasPartner,$this->active )";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Member added..");
        }
        else
        {
            $response = BaseClass::createResponse(0,"Member not added..");
        }
        return $response;
    }


    //Generate spouse id.
    function generateSpouseId()
    {
        $spouseCode = 1001;
        $sql = "SELECT MAX(SpouseId) AS 'spouseCode' FROM Spouse WHERE RegId=$this->regId";
        if($result = $this->mysqli->query($sql))
        {
            $spouserCode = intval($result->fetch_assoc()['spouseCode']);
            $spouseCode = (($spouseCode == 0) ? 1001 : $spouseCode + 1);
        }
        return $spouseCode;
    }

}