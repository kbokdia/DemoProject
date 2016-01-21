<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 19/12/15
 * Time: 1:14 PM
 */

namespace Project\Register;


use Project\Base\BaseClass;
use Project\Base\Date;

class Register
{
    var $response;
    var $users = array("User1", "User2", "User3" );

    function __construct(){
        //Initialize variables
        $this->users = array("User1", "User2", "User3" );
    }


    function getRegisteredUsersList(){
        // sql code
        /*$sql = "SELECT UserId FROM Table123";
        $response = array();
        if ($result = $this->mysqli->query($sql)) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $response[$i++] = $row['user_id'];
            }
        }
        else{
            $response = $this->mysqli->error;
        }*/

        return $this->users;
    }

    function sampleAmbuj()
    {
        echo "hello123";
    }
}