<?php
    namespace app\config;

    class MysqlDBH implements DatabaseHandler{
        
        // private $username = "giembs11_ultra"; //'root';
        // private $host = "localhost"; //'127.0.0.1';
        // private $password = "!qM2d{cy&g_6"; //'123';
        // private $dbname = "giembs11_ultradb"; //'db_cn_001';
        // private $charset = 'utf8mb4';

        private $username = 'root';
        private $host = '127.0.0.1';
        private $password = "";
        private $dbname = "ultraelon_db";
        private $charset = 'utf8mb4';

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