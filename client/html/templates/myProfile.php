<?php
    include("../../../server/php/classes/DataBaseConnection.php");
    include("../../../server/php/classes/User.php");

    session_start();
    $userDb = new User;

    if(isset($_SESSION["userId"])){
        $userId = $_SESSION["userId"];
        $user = $userDb->getUserById($userId)[0];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../components/headInfo.php"); ?>
    <title>My Profile</title>
</head>
<body>
    <?php include("../components/navBar.php"); ?>
    <div class="document">
        <?php 
            if(isset($_SESSION["userId"])){
                
        ?>
                <h1>Name: <?php echo $user[1]?></h1>
                <h1>Last Name: <?php echo $user[2]?></h1>
                <h1>User ID: <?php echo $user[0]?></h1>
                <h1>Email: <?php echo $user[3]?></h1>
        <?php
            }
        ?>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>