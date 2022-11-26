<?php

    include("../classes/DataBaseConnection.php");
    include("../classes/Task.php");
    include("../classes/TaskApplicationController.php");

    if(isset($_REQUEST["submit"]) and isset($_REQUEST["taskId"])){
        $taskApplicationController = new TaskApplicationController;

        $taskId = $_REQUEST["taskId"];
        $candidateId = $_REQUEST["candidateId"];
        $taskCreatorId = $_REQUEST["taskCreatorId"];
        $userCandidateId = $_REQUEST["userCandidateId"];
        //userCandidateId es el id del usuario del candidato
        //selectCandidate($taskId, $candidateId, $taskCreatorId, $userCandidateId)
        $taskApplicationController->selectCandidate($taskId, $candidateId, $taskCreatorId, $userCandidateId);

        //header("location: ../../../client/html/templates/tasks.php");
    }

?>