<?php

    include("../classes/DataBaseConnection.php");
    include("../classes/Task.php");

    // para que no se pueda entrar directamente a createTask.php
    // lo siguiente solo se puede ejecutar si el usuario ha iniciado sesión
    if(isset($_REQUEST["submit"]) and isset($_REQUEST["taskId"])){
        $taskDb = new Task;
        $taskId = $_REQUEST["taskId"];
        $taskDb->deleteTaskById($taskId);

        header("location: ../../../client/html/templates/tasks.php");
    }

?>