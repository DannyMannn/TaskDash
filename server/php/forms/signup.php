<?php
    include("../classes/DataBaseConnection.php");
    include("../classes/User.php");
    include("../classes/SignupController.php");

    // para que no se pueda entrar directamente a signup.php
    if(isset($_REQUEST["submit"])){
        // datos mandados por el post
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        // signup 
        $signupController = new SignupController($firstName, $lastName, $email, $password);
        $signupController->signup();

        // redirect
        //header("location: ../../../client/html/templates/home.php?error=none");
    }
?>