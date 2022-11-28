<?php
    include("../classes/DataBaseConnection.php");
    include("../classes/Notification.php");
    include("../classes/User.php");

    if(isset($_REQUEST["submit"])){
        session_start();
        $emailReceiver = $_REQUEST['emailReceiver'];
        $description = $_REQUEST['description'];
        $userId = $_REQUEST["userId"];
        
        $userDb = new User;
        $userReceiverId = $userDb->getUserByEmail($emailReceiver);

        $notifDb = new Notification;
        $notif = $notifDb->createNotif($userId, $userReceiverId[0]['userId'], $description);

        // redirect (en el futuro redireccionar a página del Task)
        header("location: ../../../client/html/templates/notifications.php");
    }
?>