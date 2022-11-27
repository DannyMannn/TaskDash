<?php
    //include("./DataBaseConnection.php");
    class Task extends DataBaseConnection{
        
        public function getAllTasks(){
            $query = "SELECT * FROM Task";
            $connection = $this->connect();

            $stm = $connection->query($query);

            return $stm->fetchAll(PDO::FETCH_ASSOC);

        }

        // returns ID of newly created Task
        public function createTask($payment, $description, $userIdCreator){
            $query = "INSERT INTO Task (payment, active, description, userIdCreator) VALUES($payment, 1, '$description', $userIdCreator);";
            $connection = $this->connect();
            // Si hay error en el siguiente query corre header("location: ../home.php?error=emailYaEnUso")
            $connection->exec($query);
            $last_id = $connection->lastInsertId();
            return $last_id;
        }

        public function deactivateTask($taskId){
            $query = "UPDATE `Task` SET active=0 WHERE taskId='$taskId';";
            $connection = $this->connect();

            $stmt = $connection->query($query);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getTaskById($taskId){
            $query = "SELECT * FROM `Task` WHERE taskId=$taskId;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        public function deleteTaskById($taskId){
            $query = "DELETE FROM `Task` WHERE taskId=$taskId;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
        
        public function getTaskCandidates($taskId){
            $query = "SELECT * FROM `Candidate` WHERE taskId=$taskId;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        public function getTaskCandidate($taskId, $userId){
            $query = "SELECT * FROM `Candidate` WHERE taskId=$taskId AND userId=$userId;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
    }
?>