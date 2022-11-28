<?php
    include("../../../server/php/classes/DataBaseConnection.php");
    include("../../../server/php/classes/Notification.php");
    include("../../../server/php/classes/User.php");

    session_start();

    $notifDb = new Notification;

    $userDb = new User;

    if(isset($_SESSION["userId"])){
        $userId = $_SESSION["userId"];
        $user = $userDb->getUserById($userId)[0];
        $notifs = $notifDb->getNotification($userId);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../components/headInfo.php"); ?>
    <title>Notifications</title>
</head>
<body>
    <?php include("../components/navBar.php"); ?>
    <div class="document">
    <?php if(isset($_SESSION['email'])){ ?>
        <?php if(!$notifs){ ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>No tienes notificaciones.</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <a href="./createNotif.php">
                    <button class="btn btn-primary my-4">Create Notification</button>
            </a>
        <?php }else{ ?>
                            
            <?php
                foreach($notifs as $row) {
                    $creator = $userDb->getUserById($row["userSenderId"])[0]; // FIRST USER OF ARRAY LENGTH 1
                ?>
                <div class="alert alert-primary alert-dismissible fade show mt-2 mb-4" role="alert">

                    <h2><strong>
                        <?php print($creator['firstName'] . " - ". $creator['email']); ?><br>
                    </strong></h2>
                    <h3><?php print("Descripción:<br>". $row['description']) ."<br>" ?></h3> 
                    <h4><?php print("Fecha: ".$row['dateCreated']) ?></h4>
                    <form action ="../../../server/php/forms/deleteNotification.php" method="POST">
                        <input type="hidden" name="notificationId" value="<?php echo $row['notificationId'] ?>">
                        <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close" name="submit"></button>
                    </form>
                    <button type="button"><a href="./createNotif.php"></a></button>
                </div>
                <?php
                    }
                ?>
                    
        <?php } ?>

    <?php }else{ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>¡Alto ahí!</strong> Necesitas tener una cuenta.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>