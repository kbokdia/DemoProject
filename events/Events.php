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
    var $eventId;
    var $name;
    var $description;
    var $location;
    var $date;
    var $time;
    var $dressCode;
    var $imagePath;
    var $image;


    function __construct()
    {
        parent::__construct();
    }

    function getEvent()
    {
        //Do Select query (Only the Name and EventId Columns) and throw the response
        /*$sql = "Select Name,EventId from Events";*/
        $sql = "SELECT Events.RegId, Events.EventId, Events.Name, Events.Description, Events.Location, DATE_FORMAT(Events.Date,'%d/%m/%Y') AS 'Date', DATE_FORMAT(Events.Time,'%H:%i') as 'Time', Events.DressCode, Events.ImagePath, Events.Timestamp FROM Events WHERE Events.RegId = $this->regId";
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
        $sql="SELECT * FROM Events WHERE RegId = $this->regId AND EventId=$eventId";
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
        $sql = "UPDATE Events SET Events.Name='$this->name', Events.Description='$this->description', Location='$this->location' , Events.Date='$this->date', Events.Time = '$this->time',DressCode='$this->dressCode' WHERE RegId = $this->regId AND Events.EventId=$eventId";
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
        $sql="INSERT INTO Events(RegId, EventId, Name, Description, Location, Date, Time, DressCode,ImagePath) VALUES ($this->regId,$eventId,'$this->name','$this->description','$this->location','$this->date','$this->time','$this->dressCode','$this->imagePath')";
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

    //Add event image
    function addImage($eventId){
        //Create folder using BaseClass::createDir($path) function
        $path = "images/".$eventId."/";
        //Save image using ImageUpload class
        //Image name = "cover.jpg"
        //Update the image path in database.
        BaseClass::createDir($path);
        $imageUpload = new ImageUpload($this->image);
        $imageUpload->dstPath=$path;
        $imageUpload->dstName="cover";

        if($imageUpload->save()){
            //ImageUpload class by default saves all the image to jpg
            $imagePath = $path."cover.jpg";
            $sql="UPDATE Events SET ImagePath = '$imagePath' WHERE EventId = $eventId;";
            if($result = $this->mysqli->query($sql)){
                $response = BaseClass::createResponse(1,"Gallery created..");
            }
            else{
                $response = BaseClass::createResponse(0,$this->mysqli->error);
            }
        }
        else{
            $response = $imageUpload->response;
        }

        //End
        return $response;
    }
}