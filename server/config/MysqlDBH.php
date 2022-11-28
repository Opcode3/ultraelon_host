<?php
    namespace app\config;

    class MysqlDBH implements DatabaseHandler{
        
        private $username = "ultraelo_mdk_root"; //'root';
        private $host = "localhost"; //'127.0.0.1';
        private $password = "Avg[G{o?}QV@"; //'123';
        private $dbname = "ultraelo_db"; //'db_cn_001';
        private $charset = 'utf8mb4';

        // private $username = 'root';
        // private $host = '127.0.0.1';
        // private $password = "";
        // private $dbname = "ultraelon_db";
        // private $charset = 'utf8mb4';

        private $connectionString;

        function __construct()
        {
            try {
                $dsn = "mysql:host=$this->host;charset=$this->charset;dbname=$this->dbname";
                $this->connectionString = new \PDO($dsn, $this->username, $this->password);
                // echo "Connected";
            } catch (\Exception $ex) {
                echo('Unable to access server...');
            }   
        }

        function connection()
        {
           return $this->connectionString;
        }
    }
?>