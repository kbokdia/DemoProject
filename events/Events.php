<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 03/02/16
 * Time: 6:12 AM
 */

namespace Project\events;

use Project\base\BaseClass;
use Project\upload\ImageUpload;

class Events extends BaseClass
{
    var $regId;
    var $eventId;
    var $name;
    var $description;
    var $location;
    var $dateTime;
    var $dressCode;
    var $imagePath;


    function __construct()
    {
        parent::__construct();
    }

    function getEvent()
    {
        //Do Select query (Only the Name and EventId Columns) and throw the response
        /*$sql = "Select Name,EventId from Events";*/
        $sql = "Select * from Events";
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



    function deleteEvent($eventId){
        //Delete query the Events table based on eventId
        $sql="Select * from Events where EventId=$eventId";
        if($result = $this->mysqli->query($sql))
        {
            $sql = "DELETE FROM Events WHERE EventId = $eventId";
            if($this->mysqli->query($sql)){
                $response = BaseClass::createResponse(1,"Event deleted");
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

    function updateEvent($eventId){
        //Update query the Events table based on eventId (Update all the columns except ImagePath)
        $sql = "Update Events set Name='$this->name', Description='$this->description', Location='$this->location' , DateTime='$this->dateTime',DressCode='$this->dressCode' where EventId=$eventId";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Event updated..");
        }
        else
        {
            $response = BaseClass::createResponse(0,"Event not updated..");
        }
        return $response;

    }

    function addEvent(){
        //Create insert query and save it
        $eventId = $this->generateEventId();
        $regId = $this->generateRegId();
        $sql="Insert into Events(RegId, EventId, Name, Description, Location, DateTime, DressCode,ImagePath) VALUES ($regId,$eventId,'$this->name','$this->description','$this->location','$this->dateTime','$this->dressCode','$this->imagePath')";
        if($result = $this->mysqli->query($sql))
        {
            $response = BaseClass::createResponse(1,"Event added..");
        }
        else
        {
            $response = BaseClass::createResponse(0,"Event not added..");
        }
        return $response;
    }

    //generate event ID
    function generateEventId(){
        $eventCode = 1001;
        $sql = "SELECT MAX(EventId) AS 'eventCode' FROM Events";
        if($result = $this->mysqli->query($sql)){
            $eventCode = intval($result->fetch_assoc()['eventCode']);
            $eventCode = (($eventCode == 0) ? 1001 : $eventCode + 1);
        }

        return $eventCode;
    }

    function generateRegId(){
        $regCode = 10001;
        $sql = "SELECT MAX(RegId) AS 'regCode' FROM Events";
        if($result = $this->mysqli->query($sql)){
            $regCode = intval($result->fetch_assoc()['regCode']);
            $regCode = (($regCode == 0) ? 10001 : $regCode + 1);
        }

        return $regCode;
    }
}