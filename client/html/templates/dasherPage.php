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
    <?php include("../../html/components/headInfo.php"); ?>
    <title>Dasher Page</title>
</head>
<body>
    <?php include("../../html/components/navBar.php"); ?>
    <?php if(isset($_SESSION['email']) and isset($_GET['ID']) ){
            $userId = $_REQUEST["ID"];
            $user = $userDb->getUserById($userId);
            
            if(sizeof($user) != 0){
                $user = $userDb->getUserById($userId)[0];
                $stats = $userDb->getUserStats($user["userId"])[0]; // FIRST USER OF ARRAY LENGTH 1
                $personalInfo = $userDb->getUserPersonalInfo($user["userId"])[0];
    ?>          
                <div class="row document">
                    <div class="container">
                        <div class="user-box">
                            <div class="pic"> 
                                <img src="../../imgs/pfp.png" alt="pfpPic" id="pfp" class="img-user">
                            </div>
                            <div class="info-user">
                                <h1><strong>Nombre:</strong> <?php echo $user["firstName"];?></h1><br>
                                <h1><strong>Apellido(s):</strong> <?php echo $user["lastName"];?></h1><br>
                                <h1><strong>Email:</strong> <?php echo $user["email"];?></h1><br>
                                <h4>Reputation: <?php print($stats["reputation"])  ?></h4>
                                <h4>Tasks Completed: <?php print($stats["tasksCompleted"])  ?></h4>
                                <h4>Tasks Given: <?php print($stats["tasksGiven"])  ?></h4>
                                <h4>Description: <?php print($personalInfo["description"])  ?></h4>
                            </div>
                    </div> 
    <?php
                    $reviews = $userDb->getAllReviews($userId);
    ?>
                    <!--ALL USER REVIEWS!!!... it's reviewer, I know. It's too late now-->
                    <div class="my-card-container">
                        <?php
                            foreach($reviews as $row) {
                                $rater = $userDb->getUserById($row["raterId"])[0]; // FIRST USER OF ARRAY LENGTH 1
                        ?>
                        <?php echo "<div class='my-a my-card rounded shadow'>"  ?>

                                <h2><?php print("Nombre: ".$rater["firstName"]." ".$rater["lastName"])  ?></h2>
                                <h4>Calidad General: <?php print($row["rating"])  ?></h4>
                                <h4>Comentario: <?php print($row["comment"])  ?></h4>

                        <?php echo "</div>" ?>

                        <?php
                            }
                        ?>
                    </div>


                    <!--ADD A REVIEW-->
                    <div class="form-container rounded-border bg-lightgrey my-3">
                        <form action="../../../server/php/forms/createReview.php" method="POST">
                            <label for="rating">Calidad General (1 - 5)</label>
                            <input class="form-control" type="number" name="rating" min="1" max="5" required>

                            <label for="comment">Comentario: </label>
                            <textarea class="form-control" type="text" name="comment" maxlength="150" required></textarea>

                            <input type="hidden" name="taskCreatorId" value="<?php echo $_REQUEST["ID"]; ?>" />
                            <input type="hidden" name="raterId" value="<?php echo $_SESSION["userId"] ?>" />


                            <button type="submit" class="btn btn-primary my-3" name="submit">Add Review!</button>
                        </form>
                    </div>


                </div>

        
    <?php    
            }else{

    ?>  
            <div class="document"> 
                <h1>ERROR 404 USUARIO NO ENCONTRADO!!</h1>
            </div>
    <?php
            
            }
    
        }else{ ?>
        <div class="document"> 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Alto ahí!</strong> Necesitas tener una cuenta.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php } ?>
    <script src="../../js/collapsedAnimation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>