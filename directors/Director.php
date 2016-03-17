<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 17-03-2016
 * Time: 22:05
 */

namespace Project\directors;

use Project\base\BaseClass;

class Director
{
    //Declare the variables.
    var $memberId;
    var $post;
    var $regId;

    function __construct(){
        parent::__construct();
    }

    //Generate the member ID for new members..
    function generateMemberId()
    {
        $memberCode = 1001;
        $sql = "SELECT MAX(MemberId) AS 'memberCode' FROM directors WHERE RegId = $this->regId";
        if($result = $this->mysqli->query($sql))
        {
            $memberCode = intval($result->fetch_assoc()['memberCode']);
            $memberCode = (($memberCode == 0) ? 1001 : $memberCode + 1);
        }
        return $memberCode;
    }

    //Add new director.
    function addDirector()
    {
        $this->memberId = $this->generateMemberId();
        $sql = "INSERT INTO directors(MemberId,Post) VALUES($this->memberId,$this->post)";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Director added.");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }

    //Delete director.
    function deleteDirector($memberId)
    {
        $sql = "DELETE FROM directors WHERE MemberId=$memberId";
        if($this->mysqli->query($sql)){
            $response = BaseClass::createResponse(1,"Director deleted.");
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }

        return $response;

    }

    //Get director details.
    function getDirector($memberId,$regId)
    {
        $sql = "SELECT * FROM directors WHERE RegId=$regId AND MemberId=$memberId";
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

    //Edit director details.
    function updateDirector($memberId,$regId)
    {
        $sql = "UPDATE directors SET Post=$this->post WHERE MemberId=$memberId AND RegId=$regId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Director details updated.");
        }
        else
        {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }



}