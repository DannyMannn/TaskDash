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
        <div>
            <h1>Crea Tu Task</h1>
            <p>El pago es cuánto dinero le pagarás a un Dasher por hacer la tarea.</p>
            <p>La descripción debe ser lo más entendible posible. Recuerda ser específico con lo que se quiere.</p>
        </div>
        
        <div class="form-container rounded-border bg-lightgrey">
            <form action="../../../server/php/forms/createTask.php">
                <label class="col-6" for="payment">Pago: </label>
                <input class="form-control col-6" type="number" name="payment" required>

                <label class="col-6" for="password">Descripción: </label>
                <textarea class="form-control" type="text" name="password" required></textarea>

                <button type="submit" class="btn btn-primary my-3">Create Task!</button>
            </form>
        </div>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>