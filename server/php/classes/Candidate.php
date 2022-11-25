<?php
    //include("./DataBaseConnection.php");
    class Candidate extends DataBaseConnection{
        // returns ID of newly created Candidate
        public function createCandidate($userId, $taskId){
            $query = "INSERT INTO Candidate (userId, taskId) VALUES($userId, $taskId);";
            $connection = $this->connect();
            // Si hay error en el siguiente query corre header("location: ../home.php?error=emailYaEnUso")
            $connection->exec($query);
            $last_id = $connection->lastInsertId();
            return $last_id;
        }

    
    }
?>