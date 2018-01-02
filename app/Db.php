<?php
namespace App;
use PDO;
class Db
{
    private static $Instance;
    private static $config ;
    public  $db;
    private  function __construct()
    {
       self::$config = include('config.php');
            try{
                $pdo = new PDO('mysql:host=' . self::$config['db']['host'] . ';
                                    dbname='. self::$config['db']['dbname'].'',
                    self::$config['db']['user'],self::$config['db']['passord']);
            }catch(\PDOException  $e){

                 echo $e->getMessage();
            }
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db = $pdo;
    }
    private  function __clone(){}

    /**
     * @return Db
     * Get Singlton
     */
    public static function getInstance()
    {
        if (self::$Instance === null)
        {
            return self::$Instance = new self();
        }
        return self::$Instance;
    }

    /**
     * @param $columbs
     * @return array
     * Получить название колонок
     */

    public function getNameColumbs($columbs)
    {
        $sql = "SHOW FIELDS FROM $columbs";
        try{
            $res  = $this->db->query($sql);
        }catch(\PDOExeption $e){
            echo $e->getMessage();
        }

        return  $this->parseDate($res);
    }

    /**
     * @param $columbs
     * @return array
     */

    public function getAllData($columbs)
    {
        $sql = "SELECT * FROM $columbs";
        try{
            $res  = $this->db->query($sql);
        }catch(\PDOExeption $e){
            echo $e->getMessage();
        }
        return $res->fetchAll();
    }
    /**
     * @param $res
     * @return array
     * Парчер
     */

    public function parseDate($res)
    {
            foreach ($res as $kye => $value)
            {
                $arr[] = $value['Field'];
            }

        return $arr;
    }

    /**
     * @return mixed
     * Получить данные
     */
    public function getData()
    {
        $sql = "SHOW TABLES";
        try{
            $res  = $this->db->query($sql);
        }catch(\PDOExeption $e){
            echo $e->getMessage();
        }

        $res = $this->parseDate($res->fetchAll(PDO::FETCH_ASSOC));

        return  $res;
    }

    /**
     * Получить все таблицы в базе
     */
    public  function getAllTables()
    {
        $tablesArry = [];
        $sql = "SHOW TABLES";
        try {
            $res = $this->db->query($sql);
        }catch (\PDOException $e){
            $e->getMessage();
        }
        $tables = $res->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $kye => $value)
        {
            foreach ($value as $kye => $value)
            {
                $tablesArry[$value] = $value;
            }
        }
        return $tablesArry;
    }


}