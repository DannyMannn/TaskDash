<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("./headInfo.php"); ?>
    <title>Home</title>
</head>
<body>
    <?php include("./navBar.php"); ?>
    <div class="document">
        <?php 
            print("Página de Tasks");
        ?>
        <a href="./createTask.php">
            <button class="btn btn-primary">Create Task</button>
        </a>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>