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
    //Declare the variables.
    var $eventId;
    var $memberId;
    var $self;
    var $spouse;
    var $children;
    var $guest;
    var $active;

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

    //Get member RSVP
    function getMemberRSVP($memberId){
        //get particular members RSVP
        $sql = "SELECT * FROM Rsvp WHERE Rsvp.MemberId=$memberId";
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

    //Delete Event RSVP
    function deleteEventRsvp($eventId){
        //Delete event based on event ID
        $sql = "DELETE FROM Rsvp WHERE EventId = $eventId";

        if($this->mysqli->query($sql)){
            $response = BaseClass::createResponse(1,"Rsvp deleted");
        }
        else{
            $response = BaseClass::createResponse(0,$this->mysqli->error);
        }

        return $response;
    }

    //Editing a RSVP.
    function updateRsvp($regId, $eventId, $memberId){
        $sql = "UPDATE Rsvp SET Self=$this->self , Rsvp.Spouse=$this->spouse, Rsvp.Children = $this->children, Rsvp.Guest=$this->guest, Rsvp.Active=$this->active WHERE Rsvp.RegId = $regId AND Rsvp.EventId=$eventId AND Rsvp.MemberId=$memberId";

        if($result = $this->mysqli->query($sql)) {
            $response = BaseClass::createResponse(1,"Rsvp updated..");
        }
        else {
            $response = BaseClass::createResponse(0,"Rsvp not updated..");
        }
        return $response;
    }

    function ActivateRsvp($eventId, $memberId){
        //for this function to work you have to add (name:"Active", type:"tinyint", NOT NULL DEFAULT 2) field into the RSVP table
        //When this function is called you have to update the active field to value 1
        //Don't forget to update the query in updateRsvp()
        $this->active=1;
        $sql = "UPDATE Rsvp SET Rsvp.Active=$this->active WHERE Rsvp.EventId=$eventId AND Rsvp.MemberId=$memberId";

        if($result = $this->mysqli->query($sql)) {
            $response = BaseClass::createResponse(1,"Active value updated..");
        }
        else {
            $response = BaseClass::createResponse(0,"Active value not updated..");
        }
        return $response;
    }

}