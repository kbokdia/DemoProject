<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 19/12/15
 * Time: 3:24 PM
 */

namespace Project\base;


use Project\db\Connection;

class BaseClass
{
    var $mysqli;

    function __construct(){
        $this->mysqli = Connection::get();
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

    public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new \InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    function __destruct(){
        $this->mysqli->close();
    }
}