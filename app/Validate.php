<?php
namespace App;
use PhpOffice\PhpSpreadsheet\Exception;

session_start();

class Validate
{
    public static $errors;

    public function __construct($error)
    {

       /*set_exception_handler([$this,'ErrException']);*/
    }

  /*  public static function ErrException(Exception $e)
    {
       var_dump('dddd');
    }*/

    public static function getError()
    {
        return  self::$errors;
    }
    public static function check()
    {

        return  (isset($_SESSION['error'] )) ? $_SESSION['error'] : "ytn";
    }
}