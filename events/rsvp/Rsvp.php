<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 12/02/16
 * Time: 7:02 PM
 */

namespace Project\Rsvp\rsvp;


use Project\base\BaseClass;

class Rsvp extends BaseClass
{
    //Todo-Ambuj: You have to implement the whole class
    //Declare the variables.
    var $regId;
    var $eventId;
    var $memberId;
    var $self;
    var $spouse;
    var $children;
    var $guest;
    var $timeStamp;

    function __construct()
    {
        parent::__construct();
    }

    //Add new RSVP for an event.
    function addRsvp($eventId)
    {
        $sql = "INSERT into Rsvp(RegId,EventId,MemberId,Self,Spouse,Children,Guest,Timestamp) values($this->regId,$eventId,$this->memberId,$this->self,$this->spouse,$this->children,$this->guest,$this->timeStamp)";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"RSVP added..");
        }
        else
        {
            $response = BaseClass::createResponse(0,"RSVP not added..");
        }
        return $response;
    }

    //Get existing RSVP.
    function getRsvp($eventId)
    {
        $sql = "SELECT Rsvp.RegId, Rsvp.EventId, Rsvp.MemberId, Rsvp.Self, Rsvp.Spouse, Rsvp.Children, Rsvp.Guest, Rsvp.Timestamp FROM Rsvp WHERE Rsvp.EventId = $eventId";
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
    function deleteRsvp($eventId)
    {
        $sql="SELECT * FROM Rsvp WHERE EventId=$eventId";
        if($result = $this->mysqli->query($sql))
        {
            $sql = "DELETE FROM Rsvp WHERE EventId = $eventId";
            if($this->mysqli->query($sql)){
                $response = BaseClass::createResponse(1,"Rsvp deleted");
            }
            else{
                $response = BaseClass::createResponse(0,$this->mysqli->error);
            }
        }
        else{
            $response = BaseClass::createResponse(0,"Invalid request");
        }

        return $response;
    }

    //Editing a RSVP.
    function updateRsvp($eventId)
    {
        $sql = "UPDATE Rsvp SET Rsvp.MemberId=$this->memberId, Self=$this->self , Rsvp.Spouse=$this->spouse, Rsvp.Children = $this->children, Rsvp.Guest=$this->guest WHERE Rsvp.EventId=$eventId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Rsvp updated..");
        }
        else
        {
            $response = BaseClass::createResponse(0,"Rsvp not updated..");
        }
        return $response;
    }

}