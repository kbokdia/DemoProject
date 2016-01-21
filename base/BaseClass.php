<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 19/12/15
 * Time: 3:24 PM
 */

namespace Project\Base;


class BaseClass
{
    var $mysqli;

    function __construct(){
        //$this->mysqli = getConnection();
    }

    public static function createResponse($status,$message){
        return array('status' => $status, 'message' => $message);
    }

    function escapeData($data){
        foreach ($data as $key => $value) {
            if(is_array($value)){
                $data[$key] = $this->escapeData($value);
            }
            else{
                $data[$key] = $this->mysqli->real_escape_string($value);
            }
        }
        return $data;
    }

    function __destruct(){
        //$this->mysqli->close();
    }
}