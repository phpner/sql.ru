<?php

namespace App\Controllers;
use App\Db;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class UserController
{
    public function index($poset = [])
    {
        $columbs = $_POST['tables'];
        $pdo = Db::getInstance();
        $date = $pdo->getAllData($columbs);
        $nameOFColum = $pdo->getNameColumbs($columbs);
        $this->getSaveToXcel($nameOFColum, $date);
    }

    public  function  getSaveToXcel($nameOFColum, $date)
    {
        $nameOFColum = array_combine($nameOFColum,$nameOFColum);
        var_dump($date);
        $arrayData = array(
            $nameOFColum,
            array(NULL, 2010, 2011, 2012),
            array('Q1',   12,   15,   21),
            array('Q2',   56,   73,   86),
            array('Q3',   52,   61,   69),
            array('Q4',   30,   32,    0),
        );

        $sxl = new Spreadsheet();

        $sxl->setActiveSheetIndex(0);
        $sheet = $sxl->getActiveSheet();

        $sheet->fromArray(
            $arrayData,  // The data to set
            NULL,        // Array values with this value will not be set
            'C1'         // Top left coordinate of the worksheet range where
        //    we want to set these values (default is A1)
        );

        $writer = new Xlsx($sxl);
        $writer->save('world.xlsx');
    }

}