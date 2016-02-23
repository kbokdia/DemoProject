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

    }


    //Generate spouse id.
    function generateSpouseId()
    {
        $memberCode = 1001;
        $sql = "SELECT MAX(MemberId) AS 'memberCode' FROM Members";
        if($result = $this->mysqli->query($sql))
        {
            $memberCode = intval($result->fetch_assoc()['memberCode']);
            $memberCode = (($memberCode == 0) ? 1001 : $memberCode + 1);
        }
        return $memberCode;
    }

}