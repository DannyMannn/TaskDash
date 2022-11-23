<?php
    //include("../connectionPdo.php");
    class User extends DataBaseConnection{
        
        public function getAllUsers(){
            //$query = "SELECT * FROM usuario";
            //$this->connect()->query("");
        }

        public function createUser($firstName, $lastName, $email, $password){
            $query = "INSERT INTO usuario (firstName, lastName, email, uPassword) VALUES('$firstName', '$lastName', '$email', '$password');";
            $connection = $this->connect();
            // Si hay error en el siguiente query corre header("location: ../home.php?error=emailYaEnUso")
            $connection->exec($query);
            $last_id = $connection->lastInsertId();
            $this->createUserInfoAndStats($last_id, $connection);
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        }

        public function checkUser(){
            $query = "SELECT email FROM usuario where email = ?;";
        }

        private function createUserInfoAndStats($userId, $connection){
            $queryInfo = "INSERT INTO PersonalInfo (description, phoneNumber, city, userID) VALUES('New on the site!','123','',$userId);";
            $queryStats = "INSERT INTO Stats (reputation, tasksCompleted, tasksGiven, userId) VALUES(0, 0, 0, $userId);";
            $connection->exec($queryInfo);
            $connection->exec($queryStats);
        }
    }
?>