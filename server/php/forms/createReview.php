<?php
    include("../classes/DataBaseConnection.php");
    include("../classes/Notification.php");
    include("../classes/User.php");

    if(isset($_REQUEST["submit"])){
        $raterId = $_REQUEST['raterId'];
        $taskCreatorId = $_REQUEST['taskCreatorId'];
        $rating = $_REQUEST["rating"];
        $comment = $_REQUEST["comment"];
        
        $userDb = new User;
        $reviewId = $userDb->createReview($raterId, $taskCreatorId, $rating, $comment);

        header("location: ../../../client/html/templates/dasherPage.php?ID={$taskCreatorId}");
    }

?>