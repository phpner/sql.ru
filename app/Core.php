<?php
namespace App;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Core{
    public static  function  init()
    {
            $pdo = Db::getInstance();
            $data = $pdo->getData();
            $tables = $pdo->getAllTables();
            return $tables;

    }



}