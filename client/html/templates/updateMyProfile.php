<?php
    include("../../../server/php/classes/DataBaseConnection.php");
    include("../../../server/php/classes/User.php");

    session_start();
    $userDb = new User;

    if(isset($_SESSION["userId"])){
        $userId = $_SESSION["userId"];
        $user = $userDb->getUserById($userId)[0];
        $userInfo = $userDb->getUserPersonalInfo($userId)[0];
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
                    <div class="info-user my-text-left">
                        <form action="../../../server/php/forms/updateUser.php" method="POST">
                            <input type="hidden" name="userId" value="<?php echo $user['userId'] ?>">

                            <label for="firstName">Primer Nombre:</label>
                            <input class="form-control" type="text" name="firstName" 
                                placeholder="Nombre" value="<?php echo $user['firstName']?>">
                            <br>

                            <label for="lastName">Apellido(s):</label>
                            <input class="form-control" type="text" name="lastName" 
                                placeholder="Apellido(s)" value="<?php echo $user['lastName']?>" >
                            <br>

                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" 
                            placeholder="Email" value="<?php echo $user['email']?>" >
                            <br>
                            
                            <label for="password">Password:</label>
                            <input class="form-control" type="password" name="password" 
                            placeholder="Password" value="<?php echo $user['uPassword'] ?>">
                            <br>

                            <label for="city">Ciudad:</label>
                            <input class="form-control" type="text" name="city" 
                            value="<?php echo $userInfo['city'] ?>">
                            <br>
                            
                            <label for="phoneNumber">Número Telefónico:</label>
                            <input class="form-control" type="text" name="phoneNumber" 
                            value="<?php echo $userInfo['phoneNumber'] ?>" maxlength="10">
                            <br>

                            <label for="description">Descripción:</label>
                            <textarea class="form-control" type="text" name="description" 
                            ><?php echo $userInfo["description"] ?></textarea>
                            <br>
                            
                            <div class="my-text-center">
                                <button type="submit" class="btn btn-primary mx-2 my-3" name="submit" value="update">Actualizar</button>
                            </div>

                        </form>
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