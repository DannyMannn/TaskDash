<?php
    session_start();
    session_unset();
    session_destroy();

    // redirect
    header("location: ../../client/html/templates/home.php?error=none");
?>