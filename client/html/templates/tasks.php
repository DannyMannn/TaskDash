<?php
    include("../../../server/php/classes/DataBaseConnection.php");
    include("../../../server/php/classes/Task.php");
    include("../../../server/php/classes/User.php");

    session_start();

    $taskDb = new Task;
    $tasks = $taskDb->getAllTasks();


    $userDb = new User;
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
        <a href="./createTask.php">
            <button class="btn btn-primary my-4">Create Task</button>
        </a>
        
        <h1>Selecciona Un Task!</h1>

        <div class="my-card-container">
            <?php
                foreach($tasks as $row) {
                    $creator = $userDb->getUserById($row[4])[0]; // FIRST USER OF ARRAY LENGTH 1
            ?>
            <?php echo "<a href='./task.php?ID={$row[0]}' class='my-a my-card rounded shadow'>"  ?>

                    <h2><?php print("Pago: \$".$row[1])  ?></h2>
                    <h2><?php print("Descripción: ".$row[3])  ?></h2>
                    <h2><?php print("Creada por: ".$creator[1]." ".$creator[2] )  ?></h2>

            <?php echo "</a>" ?>

            <?php
                }
            ?>
        </div>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>