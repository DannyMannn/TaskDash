<?php
    $name = $_REQUEST['name'];
    $lastName = $_REQUEST['lastName'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    $postInfo[4] = [$name, $lastName, $email, $password];
    $postInfoSize = count($postInfo);

    print("<h1>$name</h1>");
    print("<h1>$lastName</h1>");
    print("<h1>$email</h1>");
    print("<h1>$password</h1>");
    //for($i = 0; $i < $postInfoSize; $i++){
    //    print("<h1>$postInfo[$i]</h1><br>");
    //}
?>