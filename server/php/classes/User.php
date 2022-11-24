<?php
    //include("./DataBaseConnection.php");
    class User extends DataBaseConnection{
        
        public function getAllUsers(){
            $query = "SELECT * FROM Usuario";
            $connection = $this->connect();

            $stm = $connection->query($query);

            return $stm->fetchAll(PDO::FETCH_NUM);

        }

        public function createUser($firstName, $lastName, $email, $password){
            $query = "INSERT INTO Usuario (firstName, lastName, email, uPassword) VALUES('$firstName', '$lastName', '$email', '$password');";
            $connection = $this->connect();
            // Si hay error en el siguiente query corre header("location: ../home.php?error=emailYaEnUso")
            $connection->exec($query);
            $last_id = $connection->lastInsertId();
            $this->createUserInfoAndStats($last_id, $connection);
            //echo "New record created successfully. Last inserted ID is: " . $last_id;
            return $last_id;
        }

        public function getUser($email, $password){
            $query = "SELECT email, uPassword FROM Usuario where email = '$email' AND uPassword = '$password';";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_NUM);

            return $row;
        }

        public function getUserById(){

        }

        private function createUserInfoAndStats($userId, $connection){
            $queryInfo = "INSERT INTO PersonalInfo (description, phoneNumber, city, userId) VALUES('New on the site!','123','',$userId);";
            $queryStats = "INSERT INTO Stats (reputation, tasksCompleted, tasksGiven, userId) VALUES(0, 0, 0, $userId);";
            $connection->exec($queryInfo);
            $connection->exec($queryStats);
        }
    }
?>