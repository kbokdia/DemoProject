<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 19/12/15
 * Time: 5:34 PM
 */

namespace Project\base;


class Date
{
    public static function dbFormat($date){
        $dateFormat = explode("/", $date);
        $dateFormat = array($dateFormat[2],$dateFormat[1],$dateFormat[0]);
        return implode("-", $dateFormat);
    }

    public static function viewFormat($date){
        return "DATE_FORMAT(".$date.",'%d/%m/%Y')";
    }
}