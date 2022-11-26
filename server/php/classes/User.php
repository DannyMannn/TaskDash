<?php
    //include("./DataBaseConnection.php");
    class User extends DataBaseConnection{
        
        public function getAllUsers(){
            $query = "SELECT * FROM `Usuario`";
            $connection = $this->connect();

            $stm = $connection->query($query);

            return $stm->fetchAll(PDO::FETCH_ASSOC);

        }

        // returns ID of newly created user
        public function createUser($firstName, $lastName, $email, $password){
            $query = "INSERT INTO Usuario (firstName, lastName, email, uPassword) VALUES('$firstName', '$lastName', '$email', '$password');";
            $connection = $this->connect();
            // Si hay error en el siguiente query corre header("location: ../home.php?error=emailYaEnUso")
            $connection->exec($query);
            $last_id = $connection->lastInsertId();
            $this->createUserInfoAndStats($last_id, $connection);
            return $last_id;
        }

        public function updateUser($userId,$firstName, $lastName, $email, $password){
            $query = "UPDATE `Usuario` SET firstName = '$firstName', lastName= '$lastName', email='$email', uPassword='$password' WHERE userId='$userId';";
            $connection = $this->connect();

            $stmt = $connection->query($query);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUser($email, $password){
            $query = "SELECT * FROM `Usuario` WHERE email='$email' AND uPassword='$password';";
            $connection = $this->connect();

            $stmt = $connection->query($query);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function getUserByEmail($email){
            $query = "SELECT * FROM `Usuario` WHERE email='$email';";
            $connection = $this->connect();

            $stmt = $connection->query($query);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function getUserById($userId){
            $query = "SELECT * FROM `Usuario` WHERE userId='$userId';";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        public function getUserStats($userId){
            $query = "SELECT * FROM `Stats` WHERE userId=$userId;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        
        public function getUserPersonalInfo($userId){
            $query = "SELECT * FROM `PersonalInfo` WHERE userId=$userId;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        public function getUserCreatedTasks($userIdCreator){
            $query = "SELECT * FROM `Task` WHERE userIdCreator=$userIdCreator;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        // la lógica es como sigue: si está en modo de active=false significa que
        // ya ha concluido y todos que aún sean candidatos del Task son los que
        // completaron el task. Esto último es porque al elegir un candidato para
        // el task, los demás se borran.
        public function getUserCompletedTasks($userId){

        }


        private function createUserInfoAndStats($userId, $connection){
            $queryInfo = "INSERT INTO PersonalInfo (description, phoneNumber, city, userId) VALUES('New on the site!','123','',$userId);";
            $queryStats = "INSERT INTO Stats (reputation, tasksCompleted, tasksGiven, userId) VALUES(0, 0, 0, $userId);";
            $connection->exec($queryInfo);
            $connection->exec($queryStats);
        }
    }
?>