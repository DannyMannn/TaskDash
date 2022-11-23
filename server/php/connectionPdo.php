<?php
    class DataBaseConnection{
        private $serverName;
        private $username;
        private $password;
        private $dbName;

        public function connect(){
            $this->serverName = 'localhost';
            $this->username = 'manu';
            $this->password = 'L1m0ny54l';
            $this->dbName = 'taskdash';
            $this->charset = "utf8mb4";

            try {
                // data source name
                $dataSourceName = "mysql:host=".$this->serverName.";dbname=".$this->dbName.";charset=".$this->charset;
                $pdo = new PDO($dataSourceName, $this->username, $this->password);
                //para mandar los errores al catch de la excepción
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected Successfully!";
                return $pdo;
            } catch (PDOException $e) {
                echo "Connection Failed: ".$e->getMessage();
                die();
            }
        }
    }

?>