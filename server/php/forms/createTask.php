<?php
    include("../classes/DataBaseConnection.php");
    include("../classes/Task.php");

    // para que no se pueda entrar directamente a createTask.php
    // lo siguiente solo se puede ejecutar si el usuario ha iniciado sesión
    if(isset($_REQUEST["submit"])){
        session_start();
        $payment = $_REQUEST['payment'];
        $description = $_REQUEST['description'];
        $userId = $_SESSION["userId"];
            
        $taskDb = new Task;
        $taskDb->createTask($payment, $description, $userId);

        // redirect (en el futuro redireccionar a página del Task)
        header("location: ../../../client/html/templates/tasks.php");
        /*
        if(isset($_SESSION["userId"])){
            // datos mandados por el post
            $payment = $_REQUEST['payment'];
            $description = $_REQUEST['description'];
            $userId = $_SESSION["userId"];
            
            $taskDb = new Task;
            $taskDb->createTask($payment, $description, $userId);

            // redirect (en el futuro redireccionar a página del Task)
            header("location: ../../../client/html/templates/tasks.php");
        }
        else{
            //header("location: ../../../client/html/templates/home.php");
        }
        */
    }

?>