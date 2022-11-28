<?php
    include("../../../server/php/classes/DataBaseConnection.php");
    include("../../../server/php/classes/Task.php");
    include("../../../server/php/classes/User.php");
    include("../../../server/php/classes/Candidate.php");

    session_start();
    $taskDb = new Task;
    $userDb = new User;
    $candidateDb = new Candidate;
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
        <?php if(isset($_SESSION['email'])){ ?>
            <?php
                if(isset($_GET['ID']) and isset($_SESSION['userId'])){
                    $taskId = $_GET['ID'];
                    $task = $taskDb->getTaskById($taskId)[0];
                    $userId = $_SESSION['userId'];
                    $creator = $userDb->getUserById($task['userIdCreator'])[0]; // FIRST USER OF ARRAY LENGTH 1


                    echo "<div class='my-card rounded shadow'>";
                    echo    "<h2>Pago: \${$task['payment']}</h2>";
                    echo    "<h2>Descripción: {$task['description']}</h4>";
                    echo    "Creada por: ".$creator['firstName']." ".$creator['lastName'];
                    echo "</div>";
                }
            ?>
            <?php
                if($userId == $task['userIdCreator'] and $task['active'] == 1){//userId == task.userIdCreator? (si este usuario es el creador del Task)

            ?>
                <form action='../../../server/php/forms/deleteTask.php' method='GET'>
                    <button class="btn btn-danger" type="submit" name="submit">Borrar</button>
                    <input type="hidden" name="taskId" value="<?php echo $taskId; ?>" />
                </form>

            <?php
                }
                else{
            ?>
                <?php
                    if(sizeof($taskDb->getTaskCandidate($taskId, $userId)) == 0 and $task['active'] == 1){
                ?>

                <form action="../../../server/php/forms/applyTask.php">
                    <input type="hidden" name="taskId" value="<?php echo $taskId; ?>" />
                    <input type="hidden" name="userId" value="<?php echo $userId; ?>" />
                    <button class="btn btn-primary" type="submit" name="submit">¡Aplicar!</button>
                </form>


                <?php
                    }
                    else if(sizeof($taskDb->getTaskCandidate($taskId, $userId)) > 0 and $task['active'] == 1){
                ?>

                    <form action="../../../server/php/forms/unapplyTask.php">
                        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>" />
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>" />
                        <button class="btn btn-warning" type="submit" name="submit">¡Borrar Aplicación!</button>
                    </form>

            <?php
                    }
                    else if($task['active'] == 0){
            ?>  
                    <button class="btn btn-secondary">¡Task Terminada!</button>
            <?php
                    }
                }
            ?>

            <h1>Candidatos: </h1>

            <div class="my-card-container">
                <?php
                    $candidatos = $taskDb->getTaskCandidates($taskId);
                    foreach($candidatos as $row) {
                        $user = $userDb->getUserById($row["userId"])[0]; // FIRST USER OF ARRAY LENGTH 1
                        $stats = $userDb->getUserStats($row["userId"])[0]; // FIRST USER OF ARRAY LENGTH 1
                ?>
                <?php echo "<div class='my-a my-card rounded shadow'>"  ?>

                        <h2><?php print("Nombre: ".$user['firstName']." ".$user['lastName'])  ?></h2>
                        <h2><?php print("Reputation: ".$stats['reputation'])  ?></h2>
                        <h2><?php print("Tasks Completed: ".$stats['tasksCompleted'])  ?></h2>
                        <h2><?php print("Tasks Given: ".$stats['tasksGiven'])  ?></h2>
                        
                        <?php
                            if($userId == $task['userIdCreator'] and $task['active'] == 1){//userId == task.userIdCreator? (si este usuario es el creador del Task)
                                $taskId = $row['taskId'];
                                $candidateId = $row['candidateId'];
                                $taskCreatorId = $creator['userId'];
                                $userCandidateId = $user['userId'];

                        ?>
                            <form action='../../../server/php/forms/selectCandidate.php' method='GET'>
                                <button class="btn btn-primary" type="submit" name="submit">Elegir</button>
                                <input type="hidden" name="taskId" value="<?php echo $taskId; ?>" />
                                <input type="hidden" name="candidateId" value="<?php echo $candidateId; ?>" />
                                <input type="hidden" name="taskCreatorId" value="<?php echo $taskCreatorId; ?>" />
                                <input type="hidden" name="userCandidateId" value="<?php echo $userCandidateId; ?>" />
                            </form>

                        <?php
                            }
                            else if($task['active'] == 0){

                        ?> 
                                <button class="btn btn-primary" type="submit" name="submit">YA ELEGIDO!</button>
                        <?php
                            }
                        
                        ?>
                <?php echo "</div>" ?>
                <?php
                    }
                ?>
            </div>
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