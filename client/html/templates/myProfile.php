<?php
    include("../../../server/php/classes/DataBaseConnection.php");
    include("../../../server/php/classes/User.php");

    session_start();
    $userDb = new User;

    if(isset($_SESSION["userId"])){
        $userId = $_SESSION["userId"];
        $user = $userDb->getUserById($userId)[0];

        $userCreatedTasks = $userDb->getUserCreatedTasks($user["userId"]);
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
    <?php if(isset($_SESSION['email'])){ ?>
        <div class="document">
         
            <h1>Name: <?php echo $user["firstName"]?></h1>
            <h1>Last Name: <?php echo $user["lastName"]?></h1>
            <h1>User ID: <?php echo $user["userId"]?></h1>
            <h1>Email: <?php echo $user["email"]?></h1>
            <h1>Tasks creadas por mí;</h1>
            <?php
                echo "<div class='my-card-container'>";
                foreach($userCreatedTasks as $row) {
                    echo "<div class='my-card rounded shadow'>";
                    echo    "<h2>Pago: \${$row['payment']}</h2>";
                    echo    "<h2>Descripción: {$row['description']}</h2>";
                    echo    "<button class='btn btn-primary'>Ver mas</button>";
                    echo "</div>";

                }         
                echo "</div>";
            
        ?>
        </div>
    <?php }else{ ?>
        <div class="document"> 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Alto ahí!</strong> Necesitas tener una cuenta.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>