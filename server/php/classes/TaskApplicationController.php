<?php
    //include("./Task.php");
    class TaskApplicationController extends DataBaseConnection{

        public function selectCandidate($taskId, $candidateId, $taskCreatorId, $userCandidateId){
            //delete all other candidates except the one that got selected
            $query = "DELETE FROM `Candidate` WHERE taskId=$taskId AND candidateId!=$candidateId;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            //get Task description
            $description1 = "¡Felicidades, Dasher! Has sido seleccionado para completar el Task: ";
            $taskDb = new Task;
            $description2 = $taskDb->getTaskById($taskId)[0]["description"];
            $fullDescription = $description1.$description2;

            // deactivate Task (active = 0)
            $taskDb->deactivateTask($taskId);

            //crear notificaciones (solo notificacion que va al dasher o candidato)
            $query = "INSERT INTO Notification (userSenderId, userReceiverId, description) VALUES($taskCreatorId, $userCandidateId, '$fullDescription');";
            $connection = $this->connect();
            $stm = $connection->query($query);

            header("location: ../../../client/html/templates/task.php?ID=$taskId");

            //return $row;
        }
    }

?>