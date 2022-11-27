<?php
    include("../classes/DataBaseConnection.php");
    include("../classes/Notification.php");
    include("../classes/User.php");

    if(isset($_REQUEST["submit"]) and isset($_REQUEST['notificationId'])){
        $notifId = $_REQUEST['notificationId'];
    
        $notifDb = new Notification;
        $notifDb->deleteNotifById($notifId);

        // redirect (en el futuro redireccionar a página del Task)
        header("location: ../../../client/html/templates/notifications.php");
    }

?>