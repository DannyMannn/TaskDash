<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("../components/headInfo.php"); ?>
    <title>Home</title>
</head>
<body>
    <?php include("../components/navBar.php"); ?>
    <div class="document">
        <?php
            if(isset($_SESSION['email'])){ ?>
                <div class="d-flex justify-content-center my-2">
                    <?php 
                    $firstName = $_SESSION['firstName'];
                    echo "<h1>¡Hola! $firstName</h1><br>"; ?>
                </div>
                <div id="eslogan">
                    Libera tu tiempo con TaskDash
                </div>
                <div class="portada">
                    <img src="../../imgs/task.jpg" alt="tasks" id="taskImg">
                </div>
                <div id="info">
                    Con TaskDash podrás crear diversas tareas pequeñas, ajustar
                    los precios de remuneración y escoger a alguien de la lista de 
                    interesados.
                </div>
                
                <p><a href="https://www.freepik.com/free-vector/business-people-dealing-multi-task-new-idea-working-laptop-concept-business-goals-success-satisfying-achievement_13399742.htm">Image by jcomp</a> on Freepik
                </p>
            <?php }else{ ?>
                <div class=" row mt-4 py-2">
                    <p><strong><h1>¿Quienes somos?</h1></strong></p>
                </div>
                <div class="container-fluid">
                    <p><strong><h3>Misión:</h3></strong></p>
                    <p><h4> Creación de un espacio seguro para la publicación de 
                        ofertas de trabajo de duración corta.
                    </h4></p>
                    <br><br><br>
                </div>
                <div class="container-fluid">
                    <p><strong><h3>Visión:</h3></strong></p>
                    <p><h4>Ser un medio donde las personas puedan obtener un ingreso extra,
                        apoyar a la economía local mediante el empleo de personas 
                        independiente en la realización de tareas pequeñas creadas 
                        por los mismos usuarios.
                    </h4></p>
                </div>
            <?php } ?>

            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'invalidCredentials'){
            ?>
                <script>
                    var ready = (callback) => {
                        if (document.readyState != "loading") callback();
                        else document.addEventListener("DOMContentLoaded", callback);
                    }
                    
                    ready(() => { 
                        var myModal = new bootstrap.Modal(document.getElementById('staticBackdropSignin'));
                        myModal.show();

                        var modalBody = document.getElementById('modal-body-signin');

                        const errorMessage = document.createElement("p");
                        errorMessage.classList.add("text-danger");
                        errorMessage.innerHTML = "Error en las credenciales. Por favor checa tus datos.";

                        modalBody.prepend(errorMessage);
                    });
                </script>

            <?php
                    }
                    if($_GET['error'] == 'emailAlreadyExists'){
                        
            ?>
                <script>
                    var ready = (callback) => {
                        if (document.readyState != "loading") callback();
                        else document.addEventListener("DOMContentLoaded", callback);
                    }
                    
                    ready(() => { 
                        var myModal = new bootstrap.Modal(document.getElementById('staticBackdropSignup'));
                        myModal.show();

                        var modalBody = document.getElementById('modal-body-signup');

                        const errorMessage = document.createElement("p");
                        errorMessage.classList.add("text-danger");
                        errorMessage.innerHTML = "Error en las credenciales. El usuario con ese email ya existe.";

                        modalBody.prepend(errorMessage);
                    });
                </script>
            <?php
                    }
                }
            ?>
                
            
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>