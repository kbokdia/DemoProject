<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 12/02/16
 * Time: 7:02 PM
 */

namespace Project\events\rsvp;


use Project\base\BaseClass;

class Rsvp extends BaseClass
{
    //Todo-Ambuj: You have to implement the whole class
    //Declare the variables.
    var $eventId;
    var $memberId;
    var $self;
    var $spouse;
    var $children;
    var $guest;

    function __construct(){
        parent::__construct();
    }

    //Add new RSVP for an event.
    function addRsvp($regId,$eventId,$memberId){
        $sql = "INSERT INTO Rsvp(RegId,EventId,MemberId,Self,Spouse,Children,Guest) VALUES($regId,$eventId,$memberId,$this->self,$this->spouse,$this->children,$this->guest)";

        if($result = $this->mysqli->query($sql)) {
            $response = BaseClass::createResponse(1,"RSVP added..");
        }
        else {
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }
        return $response;
    }

    //Get existing RSVP.
    function getRsvp($eventId){
        $sql = "SELECT Rsvp.RegId, Rsvp.EventId, Rsvp.MemberId, Rsvp.Self, Rsvp.Spouse, Rsvp.Children, Rsvp.Guest, Rsvp.Timestamp FROM Rsvp WHERE Rsvp.RegId = $this->regId AND Rsvp.EventId = $eventId";
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

    //Delete a RSVP.
    function deleteMemberRsvp($eventId,$memberId){
        $sql = "DELETE FROM Rsvp WHERE RegId = $this->regId AND EventId = $eventId AND Rsvp.MemberId = $memberId";

        if($this->mysqli->query($sql)){
            $response = BaseClass::createResponse(1,"Rsvp deleted");
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }

        return $response;
    }

    //Editing a RSVP.
    function updateRsvp($eventId, $memberId){
        $sql = "UPDATE Rsvp SET Self=$this->self , Rsvp.Spouse=$this->spouse, Rsvp.Children = $this->children, Rsvp.Guest=$this->guest WHERE Rsvp.RegId = $this->regId AND Rsvp.EventId=$eventId AND Rsvp.MemberId=$memberId";

        if($result = $this->mysqli->query($sql)) {
            $response = BaseClass::createResponse(1,"Rsvp updated..");
        }
        else {
            $response = BaseClass::createResponse(0,"Rsvp not updated..");
        }
        return $response;
    }

}