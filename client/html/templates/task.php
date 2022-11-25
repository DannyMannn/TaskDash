<?php
    include("../../../server/php/classes/DataBaseConnection.php");
    include("../../../server/php/classes/Task.php");
    include("../../../server/php/classes/User.php");

    session_start();
    $taskDb = new Task;
    $userDb = new User;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../components/headInfo.php"); ?>
    <title>Task</title>
</head>
<body>
    <?php include("../components/navBar.php"); ?>
    <div class="document">
        <?php
            if(isset($_GET['ID']) and isset($_SESSION['userId'])){
                $taskId = $_GET['ID'];
                $task = $taskDb->getTaskById($taskId)[0];
                $userId = $_SESSION['userId'];
                $creator = $userDb->getUserById($userId)[0]; // FIRST USER OF ARRAY LENGTH 1


                echo "<div class='my-card rounded shadow'>";
                echo    "<h2>Pago: \${$task['payment']}</h2>";
                echo    "<h2>Descripción: {$task['description']}</h2>";
                echo    "Creada por: ".$creator['firstName']." ".$creator['lastName'];
                echo "</div>";

            }

        ?>


        <?php
            if($userId == $task['userIdCreator']){//userId == task.userIdCreator? (si este usuario es el creador del Task)

        ?>
            <form action='../../../server/php/forms/deleteTask.php' method='GET'>
                <button class="btn btn-danger" type="submit" name="submit">Borrar</button>
                <input type="hidden" name="taskId" value="<?php echo $taskId; ?>" />
            </form>

        <?php
            }
            else{

        ?>
            <form action="../../../server/php/forms/applyTask.php">
                <button class="btn btn-primary" type="submit" name="submit">¡Aplicar!</button>
            </form>
        <?php
            }
        ?>


        <h1>Candidatos: </h1>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>