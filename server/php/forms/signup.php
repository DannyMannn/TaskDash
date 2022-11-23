<?php
    include("../connection.php");
    include("../connectionPdo.php");
    include("../User.php");
    include("../SignupController.php");

    // para que no se pueda entrar directamente a signup.php
    if(isset($_REQUEST["submit"])){
        $userDb = new User;

        // datos mandados por el post
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        

        print("<h1>$firstName</h1>");
        print("<h1>$lastName</h1>");
        print("<h1>$email</h1>");
        print("<h1>$password</h1>");

        // signup 
        $signupController = new SignupController($firstName, $lastName, $email, $password);
        $signupController->signup();

        // redirect
        header("location: ../../../client/html/home.php?error=none");

        //$userDb->createUser($firstName, $lastName, $email, $password);
    }
?>