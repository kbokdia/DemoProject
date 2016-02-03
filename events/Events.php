<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 03/02/16
 * Time: 6:12 AM
 */

namespace Project\events;


use Project\base\BaseClass;

class Events extends BaseClass
{
    var $name;
    var $description;
    var $location;
    var $dateTime;
    var $dressCode;

    function getEvents(){
        //Do Select query (Only the Name and EventId Columns) and throw the response
    }

    function deleteEvent($eventId){
        //Delete query the Events table based on eventId
    }

    function updateEvent($eventId){
        //Update query the Events table based on eventId (Update all the columns except ImagePath)
    }

    function addEvent(){
        //Create insert query and save it
        $eventId = $this->generateEventId();
    }

    //generate event ID
    function generateEventId(){
        $eventCode = 1001;
        $sql = "SELECT MAX(EventId) AS 'eventCode' FROM test.Events";
        if($result = $this->mysqli->query($sql)){
            $eventCode = intval($result->fetch_assoc()['eventCode']);
            $eventCode = (($eventCode == 0) ? 1001 : $eventCode + 1);
        }

        return $eventCode;
    }
}