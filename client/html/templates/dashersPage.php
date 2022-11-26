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
    <?php if(isset($_SESSION['email'])){ ?>
    <div class="document">   
        <h1 class="my-3">¡Todos Nuestros Dashers!</h1>
        <div class="my-card-container">
            
            <?php
                foreach($users as $row) {
                    $stats = $userDb->getUserStats($row["userId"])[0]; // FIRST USER OF ARRAY LENGTH 1
                    $personalInfo = $userDb->getUserPersonalInfo($row["userId"])[0];
            ?>
                <div class="my-card rounded shadow">
                    <h2><?php print("Nombre: ".$row["firstName"]." ".$row["lastName"])  ?></h2>
                    <h4>Reputation: <?php print($stats["reputation"])  ?></h4>
                    <h4>Tasks Completed: <?php print($stats["tasksCompleted"])  ?></h4>
                    <h4>Tasks Given: <?php print($stats["tasksGiven"])  ?></h4>
                    <h4>Description: <?php print($personalInfo["description"])  ?></h4>
                
                </div>

                <?php }?>
        </div>

    </div>

    <?php }else{ ?>
        <div class="document"> 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Alto ahí!</strong> Necesitas tener una cuenta.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php }?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<!--
    -->