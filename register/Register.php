<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 19/12/15
 * Time: 1:14 PM
 */

namespace Project\register;


use Project\Base\BaseClass;
use Project\Base\Date;

class Register extends BaseClass
{
    var $response;
    var $users = array("User1", "User2", "User3" );

    function __construct(){
        parent::__construct();

        //Initialize variables
        $this->users = array("User1", "User2", "User3" );
    }


    function getRegisteredUsersList(){
        // sql code
        $sql = "SELECT * FROM users";
        $response = array();
        if ($result = $this->mysqli->query($sql)) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $response[$i++] = $row;
            }
        }
        else{
            $response = $this->mysqli->error;
        }

        return $response;
    }

    function sampleAmbuj()
    {
        echo "hello123";
    }
}