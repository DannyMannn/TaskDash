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
    <title>Create Notification</title>
</head>
<body>
    <?php include("../components/navBar.php"); ?>
    <div class="document">
        <?php if(isset($_SESSION['email'])){ ?>
            <div class="row">
                <h2>Escribir notificación</h2>
            </div>
            <div class="row document">
            <div class="container">
                <div class="user-box">
                    <div class="info-user">
                        <form action="../../../server/php/forms/createNotification.php" method="POST">
                            <br><br><br>
                            <input type="hidden" name="userId" value="<?php echo $user['userId'] ?>">

                            <label>Email a quien le envias la notificación</label>
                            <input class="form-control col-6" type="email" name="emailReceiver" 
                                placeholder="Email">
                            <br><br>

                            <label class="col-6" for="description">Descripción: </label>
                            <textarea class="form-control" type="text" name="description" required></textarea>
                            <br><br><br>

                            <button type="submit" class="btn btn-primary mx-2" name="submit" value="update">Enviar</button>
                        </form>
                </div>
            </div> 
        </div>
        <?php }else{ ?>  
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Alto ahí!</strong> Necesitas tener una cuenta.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html> 