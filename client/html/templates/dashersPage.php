<?php
    include("../../../server/php/classes/DataBaseConnection.php");
    include("../../../server/php/classes/User.php");

    session_start();

    $userDb = new User;
    $users = $userDb->getAllUsers();
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../components/headInfo.php"); ?>
    <title>Dashers</title>
</head>
<body>
    <?php include("../components/navBar.php"); ?>
    <div class="document">
       
        <div class="my-card-container">
            <?php
                foreach($users as $row) {
                    $stats = $userDb->getUserStats($row[0])[0]; // FIRST USER OF ARRAY LENGTH 1
            ?>
                <div class="my-card rounded shadow">
                    <h2><?php print("Nombre: ".$row[1]." ".$row[2])  ?></h2>
                    <h4>Reputation: <?php print($stats["reputation"])  ?></h4>
                    <h4>Tasks Completed: <?php print($stats["tasksCompleted"])  ?></h4>
                    <h4>Tasks Given: <?php print($stats["tasksGiven"])  ?></h4>
                </div>

            <?php
                }
            ?>
        </div>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>