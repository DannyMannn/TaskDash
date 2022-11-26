<?php 
    include("../classes/DataBaseConnection.php");
    include("../classes/User.php");
    include("../classes/UpdateUserController.php");

    if(isset($_REQUEST["submit"])){
        
        $userId = $_REQUEST['userId'];
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        //update
        $updateController = new UpdateUserController($userId,$firstName,$lastName,$email,$password);
        $updateController->update();

        //redirect
        header("location: ../../../client/html/templates/MyProfile.php?error=none");
    }
?>