<?php

    include("../classes/DataBaseConnection.php");
    include("../classes/Candidate.php");

    if(isset($_REQUEST["submit"]) and isset($_REQUEST["taskId"])){
        $candidateDb = new Candidate;
        $taskId = $_REQUEST["taskId"];
        $userId = $_REQUEST["userId"];
        $candidateDb->deleteCandidateByUserId($userId);

        header("location: ../../../client/html/templates/task.php?ID=$taskId");
    }

?>