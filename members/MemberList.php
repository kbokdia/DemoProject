<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 23/02/16
 * Time: 11:35 AM
 */

namespace Project\members;


use Project\base\BaseClass;

class MemberList extends BaseClass
{
    public function getMembers($regId){
        $sql = "SELECT Members.MemberId, Members.Name FROM Members LEFT JOIN Spouse ON Spouse.RegId = Members.RegId AND Spouse.MemberId = Members.MemberId WHERE Members.RegId = $regId;";
        if($result = $this->mysqli->query($sql)){
            $response = BaseClass::createResponse(1,"Successful");
            $response["list"] = [];
            while($row = $result->fetch_assoc()){
                $response["list"][] = $row;
            }
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }
}