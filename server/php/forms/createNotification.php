<?php
    include("../classes/DataBaseConnection.php");
    include("../classes/Notification.php");
    include("../classes/User.php");

    // para que no se pueda entrar directamente a createNotif.php
    // lo siguiente solo se puede ejecutar si el usuario ha iniciado sesión
    if(isset($_REQUEST["submit"])){
        session_start();
        $emailReceiver = $_REQUEST['emailReceiver'];
        $description = $_REQUEST['description'];
        $userId = $_SESSION["userId"];
        
        $userDb = new User;
        $userReceiverId = $userDb->getUserByEmail($emailReceiver);

        $notifDb = new Notification;
        $notif = $notifDb->createNotif($userId, $userReceiverId[0]['userId'], $description);

        // redirect (en el futuro redireccionar a página del Task)
        header("location: ../../../client/html/templates/notifications.php");
    }

?>