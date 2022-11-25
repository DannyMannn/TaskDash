<?php
    include("../classes/DataBaseConnection.php");
    include("../classes/Candidate.php");

    // para que no se pueda entrar directamente a createTask.php
    // lo siguiente solo se puede ejecutar si el usuario ha iniciado sesión
    if(isset($_REQUEST["submit"])){
        //session_start();
        $userId = $_REQUEST['userId'];
        $taskId = $_REQUEST['taskId'];
            
        $candidateDb = new Candidate;
        $canidateId = $candidateDb->createCandidate($userId, $taskId);

        // redirect (en el futuro redireccionar a página del Task)
        header("location: ../../../client/html/templates/task.php?ID={$taskId}");
    }

?>