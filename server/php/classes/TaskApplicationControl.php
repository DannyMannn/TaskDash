<?php
    class TaskApplicationControl{
        // UNFINISHED FUNCTION
        public selectCandidate($taskId, $candidateId, $userSenderId, $userCandidateId){
            //delete all other candidates except the one that got selected
            $query = "DELETE FROM `Candidate` WHERE taskId=$taskId AND candidateId!=$candidateId;";
            $connection = $this->connect();

            $stm = $connection->query($query);
            $row = $stm->fetchAll(PDO::FETCH_ASSOC);

            $description = "¡Felicidades, Dasher! Has sido seleccionado para completar el Task ....";
            //crear notificaciones (solo notificacion que va al dasher o candidato)
            $query = "INSERT INTO Notification (userSenderId, userReceiverId, description) VALUES($userSenderId, $userReceiverId, '$description');";

            //return $row;
        }
    }


?>