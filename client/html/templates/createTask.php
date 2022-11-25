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
    <?php if(isset($_SESSION['email'])){ ?>
    <div class="document">
        <div>
            <h1>Crea Tu Task</h1>
            <p>El pago es cuánto dinero le pagarás a un Dasher por hacer la tarea.</p>
            <p>La descripción debe ser lo más entendible posible. Recuerda ser específico con lo que se quiere.</p>
        </div>
        
        <div class="form-container rounded-border bg-lightgrey">
            <form action="../../../server/php/forms/createTask.php" method="POST">
                <label class="col-6" for="payment">Pago: </label>
                <input class="form-control col-6" type="number" name="payment" required>

                <label class="col-6" for="description">Descripción: </label>
                <textarea class="form-control" type="text" name="description" required></textarea>

                <button type="submit" class="btn btn-primary my-3" name="submit">Create Task!</button>
            </form>
        </div>
    </div>
     <?php }else{ ?>  
        <div class="document"> 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Alto ahí!</strong> Necesitas tener una cuenta.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php }?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>