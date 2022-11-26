<?php
    include("../classes/DataBaseConnection.php");
    include("../classes/User.php");
    include("../classes/SigninController.php");

    // para que no se pueda entrar directamente a signup.php
    if(isset($_REQUEST["submit"])){
        // datos mandados por el post
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        // signin
        $signinController = new SigninController($email, $password);
        $signinController->signin();

        // redirect
        //header("location: ../../../client/html/templates/home.php?error=none");
    }

?>