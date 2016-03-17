<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 15-03-2016
 * Time: 21:53
 */

namespace Project\mediator;


namespace Acme;



class Response
{
    public static function createMessage($code,$description = null){
        if(is_null($description)){
            $description = Response::getDescription($code);
        }
        return array("code"=>$code, "description"=>$description);
    }

    private static function getDescription($code){
        $message = "Invalid request type";
        switch($code){
            case "00":
                $message = "Invalid request type";
                break;
            case "01":
                $message = "Invalid parameters";
                break;
            case "02":
                $message = "Internal server error";
                break;
            case "03":
                $message = "Unauthorised";
                break;
            case "04":
                $message = "Invalid JSON";
                break;
            case "05":
                $message = "DB Error";
                break;
            case "06":
                $message = "Rule breached";
                break;
            case "10":
                $message = "Successful";
                break;
        }
        return $message;
    }
}