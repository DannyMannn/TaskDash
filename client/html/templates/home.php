<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../components/headInfo.php"); ?>
    <title>Home</title>
</head>
<body>
    <?php include("../components/navBar.php"); ?>
    <div class="document">
        <?php
            if(isset($_SESSION['email'])){
                $firstName = $_SESSION['firstName'];
                echo "<h1>Hello, $firstName!</h1><br>";
            }
            if(isset($_SESSION['email'])){
                $userId = $_SESSION['userId'];
                echo "<h1>Con ID = , $userId</h1><br>";
            }
        ?>
        <h3>Tasks Disponibles</h3>
        <br><br><br><br>

        <h3>Dashers Con Las Mejores Reputaciones</h3>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>