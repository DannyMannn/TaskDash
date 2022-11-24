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
        <?php 
            print("Página de Dashers");
            foreach($users as $row) {

                printf("<br>{$row[1]} {$row[2]} {$row[3]}");
            }
        ?>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>