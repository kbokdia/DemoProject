<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 15/10/15
 * Time: 3:14 PM
 */

namespace Project\db;

require 'config.php';

class Connection
{
    public static function get(){

        $mysqli  = new \mysqli(HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($mysqli->connect_errno) {
            die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }

        return $mysqli;
    }
}