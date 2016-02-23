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
    function addSpouse($memberId)
    {
        $sql = "INSERT INTO Spouse (MemberId,Name,DOB,Gender,Email,Email1,Mobile,Mobile1,Mobile2,BloodGroup,Occupation,BusinessType,OfficeAddress,OfficeAreaCode,OfficePincode,OfficeCityCode,OfficeStateCode,OfficePhone,OfficeCentrex,Hobbies,Recognition) VALUES ($memberId,'$this->name','$this->dob',$this->gender,'$this->email','$this->email1','$this->mobile','$this->mobile1','$this->mobile2','$this->bloodGroup','$this->occupation','$this->businessType','$this->officeAddress','$this->officeAreaCode','$this->officePincode','$this->officeCityCode','$this->officeStateCode','$this->officePhone','$this->officeCentrex','$this->hobbies','$this->recognition')";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Spouse added.");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }

    //Delete a spouse.
    function deleteSpouse($memberId)
    {
        $sql = "DELETE FROM Spouse WHERE MemberId=$memberId";
        echo $sql;
        if($this->mysqli->query($sql)){
            $response = BaseClass::createResponse(1,"Spouse deleted.");
            $this->updateHasPartnerToInactive($memberId);
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }

        return $response;
    }


    //Update spouse details.
    function updateSpouse($regId,$memberId)
    {
        $sql = "UPDATE Spouse SET Name=$this->name,DOB=$this->dob,Gender=$this->gender,Email=$this->email,Email1=$this->email1,Mobile=$this->mobile,Mobile1=$this->mobile1,Mobile2=$this->mobile2,BloodGroup=$this->bloodGroup,Occupation=$this->occupation,BusinessType=$this->businessType,OfficeAddress=$this->officeAddress,OfficeAreaCode=$this->officeAreaCode,OfficePincode=$this->officePincode,OfficeCityCode=$this->officeCityCode,OfficeStateCode=$this->officeStateCode,OfficePhone=$this->officePhone,OfficeCentrex=$this->officeCentrex,Hobbies=$this->hobbies,Recognition=$this->recognition WHERE RegId=$regId AND MemberId=$memberId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Spouse details updated.");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }


    //Get spouse details.
    function getSpouse($memberId,$regId)
    {
        $sql = "SELECT * FROM Spouse WHERE RegId=$regId AND MemberId=$memberId";
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


    //Update hasPartner.
    function updateHasPartnerToInactive($memberId)
    {
        $sql="UPDATE Members Set HasPartner=2 WHERE MemberId=$memberId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Has Partner field updated.");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }
}