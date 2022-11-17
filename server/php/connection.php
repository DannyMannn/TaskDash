<?php 
    function Connection(){
        $servername = 'localhost';
        $database = 'taskdash';
        $username = 'manu';
        $password = 'L1m0ny54l';
        if(!($conn = mysqli_connect($servername,$username,$password,$database))){
            print("Error en la conexión");
            exit();
        }else{
            print("Éxito");
        }
    }
    
?>