<?php
/**
 * Created by PhpStorm.
 * User: ambujkathotiya
 * Date: 23/02/16
 * Time: 11:46 AM
 */

namespace Project\members\children;


use Project\base\BaseClass;

class Children extends BaseClass
{
    var $kidId;
    var $name;
    var $dob;
    var $gender;
    var $email;
    var $email1;
    var $mobile;
    var $mobile1;
    var $mobile2;
    var $bloodGroup;
    var $hobbies;

    function __construct(){
        parent::__construct();
    }


    //Generate children id.
    function generateChildrenId($regId,$memberId)
    {
        $childrenCode = 1001;
        $sql = "SELECT MAX(KidId) AS 'childrenCode' FROM Children WHERE RegId=$regId AND MemberId=$memberId";
        if($result = $this->mysqli->query($sql))
        {
            $childrenCode = intval($result->fetch_assoc()['childrenCode']);
            $childrenCode = (($childrenCode == 0) ? 1001 : $childrenCode + 1);
        }
        return $childrenCode;
    }


    //Add a new child.
    function addChildren($memberId,$regId)
    {
        $this->kidId=$this->generateChildrenId($regId,$memberId);
        $sql = "INSERT INTO Children (MemberId,KidId,Name,DOB,Gender,Email,Email1,Mobile,Mobile1,Mobile2,BloodGroup,Hobbies) VALUES ($memberId,$this->kidId,$this->name,$this->dob,$this->gender,$this->email,$this->email1,$this->mobile,$this->mobile1,$this->mobile2,$this->bloodGroup,$this->hobbies)";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Child added.");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }


    //Get children details.
    function getChildren($memberId,$regId,$kidId)
    {
        $sql = "SELECT * FROM Children WHERE RegId=$regId AND MemberId=$memberId AND KidId=$kidId";
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


    //Delete children.
    function deleteChildren($memberId,$kidId)
    {
        $sql = "DELETE FROM Children WHERE MemberId=$memberId AND KidId=$kidId";
        if($this->mysqli->query($sql)){
            $response = BaseClass::createResponse(1,"Child deleted.");
            $this->updateHasChildrenToInactive($memberId);
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }


    //Edit child details.
    function updateChildren($regId,$memberId,$kidId)
    {
        $sql = "UPDATE Children SET Name=$this->name,DOB=$this->dob,Gender=$this->gender,Email=$this->email,Email1=$this->email1,Mobile=$this->mobile,Mobile1=$this->mobile1,Mobile2=$this->mobile2,BloodGroup=$this->bloodGroup,Hobbies=$this->hobbies WHERE RegId=$regId AND MemberId=$memberId AND KidId=$kidId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Child details updated.");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }


    //Update hasPartner.
    function updateHasChildrenToInactive($memberId)
    {
        $sql="UPDATE Members Set hasChildren=2 WHERE MemberId=$memberId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Has Children field updated.");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }
}