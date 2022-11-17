<div class="container-fluid" style="background-color: #bde0fe;">
    <div class="container-md">    
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid">
                <a class="navbar-brand" href="./home.php">
                    <img src="../imgs/taskdash.png"  width="40" alt="Taskdash" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item px-3">
                            <a class="nav-link active" aria-current="page" href="./tasks.php">Tasks</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" aria-current="page" href="./dashersPage.php">Dashers</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" href="./myProfile.php">My Profile</a>
                        </li>
                    </ul>
                    <!-- IF USER IN SESSION-->
                    <div class="d-flex">
                        <!-- Modal SIGNIN Button-->
                        <a class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#staticBackdropSignin"> Sign in </a>
                        
                         <!-- Modal SIGNUP Button-->
                        <a class="btn btn-primary mx-2" id="btnSUp" data-bs-toggle="modal" data-bs-target="#staticBackdropSignup"> Sign up </a>
                    </div>
                    <!--ELSE SHOW SIGN OUT -->
                </div>
            </div>
        </nav>
    </div>   
</div>
<?php include("./modalSignin.php"); ?>
<?php include("./modalSignup.php"); ?>