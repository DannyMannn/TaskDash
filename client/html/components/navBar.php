<div class="container-fluid" style="background-color: #bde0fe;">
    <div class="container-md">    
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="./home.php">
                    <img src="../../imgs/taskdash.png"  width="40" alt="Taskdash" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(isset($_SESSION['email'])){ ?>
                        <li class="nav-item px-3">
                            <a class="nav-link" aria-current="page" href="../templates/home.php">Home</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" aria-current="page" href="../templates/tasks.php">Tasks</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" aria-current="page" href="../templates/dashersPage.php">Dashers</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" href="../templates/myProfile.php">My Profile</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" href="../templates/notifications.php">Notifications</a>
                        </li>
                    <?php } ?>
                    </ul>
                    <!-- IF USER IN SESSION-->
                    <div class="d-flex">
                        <?php
                            if(!isset($_SESSION['email']))
                            {
                        ?>
                            <!-- Modal SIGNIN Button-->
                            <a class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#staticBackdropSignin"> Sign in </a>
                            
                            <!-- Modal SIGNUP Button-->
                            <a class="btn btn-primary mx-2" id="btnSUp" data-bs-toggle="modal" data-bs-target="#staticBackdropSignup"> Sign up </a>
                        <?php
                            }
                            else
                            {
                        ?>
                            <form action="../../../server/php/signout.php">
                                <button type="submit" class="btn btn-primary mx-2" id="signout"> Sign out </button>
                            </form>
                            
                        <?php
                            }
                        ?>


                    </div>
                    <!--ELSE SHOW SIGN OUT -->
                </div>
            </div>
        </nav>
    </div>   
</div>
<?php include("../components/modalSignin.php"); ?>
<?php include("../components/modalSignup.php"); ?>