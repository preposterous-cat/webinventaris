<?php
    class Database {
        private $dbHost = DB_HOST;
        private $dbUser = DB_USER;
        private $dbPass = DB_PASS;
        private $dbName = DB_NAME;

        private $statement;
        private $dbHandler;
        private $error;

        //Koneksi Database
        public function __construct() 
        {
            $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try 
            {
                $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //Fungsi untuk membuat perintah Query
        public function query($sql) 
        {
            $this->statement = $this->dbHandler->prepare($sql);
        }

        //Menyimpan Nilai
        public function bind($parameter, $value, $type = null) 
        {
            switch (is_null($type)) 
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($parameter, $value, $type);
        }

        //Eksekusi statement
        public function execute() 
        {
            return $this->statement->execute();
        }

        //Mengembalikan sebuah array
        public function resultSet() 
        {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        //Mengembalikan baris tertentu sebagai objek
        public function single() 
        {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        //Mengembalikan jumlah baris
        public function rowCount() 
        {
            $this->execute();
            return $this->statement->rowCount();
        }
    }
