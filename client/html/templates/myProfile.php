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
    <?php include("../../html/components/headInfo.php"); ?>
    <title>My Profile</title>
</head>
<body>
    <?php include("../../html/components/navBar.php"); ?>
    <?php if(isset($_SESSION['email'])){ ?>
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
                    </div>
                    <!-- <form action="../../../server/php/forms/updateUser.php" method="POST"> -->
                    <div class="float-end mx-5 mt-5">
                        <a href="./updateMyProfile.php">
                            <button type="button" class="btn btn-primary mx-2 btn-lg" name="updateMyProfile" value="update">Actualizar</button>
                        </a>
                    </div>
                    <!-- </form> -->
                </div>
                <h1><strong>Tasks creadas por mí</strong></h1><br>




                <div class="my-card-container">
                    <?php
                        foreach($userCreatedTasks as $row) {
                            $creator = $userDb->getUserById($row["userIdCreator"])[0]; // FIRST USER OF ARRAY LENGTH 1
                    ?>
                    <?php echo "<a href='./task.php?ID={$row['taskId']}' class='my-a my-card rounded shadow'>"  ?>

                            <h2><?php print("Pago: \$".$row['payment'])  ?></h2>
                            <h4><?php print("Descripción: ".$row['description'])  ?></h4>
                            <h5><?php print("Creada por: ".$creator['firstName']." ".$creator['lastName'] )  ?></h5>

                    <?php echo "</a>" ?>

                    <?php
                        }
                    ?>
                </div>
                
            </div> 
        </div>
        
    <?php }else{ ?>
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