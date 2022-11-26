<?php
    class SigninController{
        private $email;
        private $password;

        public function __construct($email, $password){
            $this->email = $email;
            $this->password = $password;
        }

        public function signin(){
            $userDb = new User;
            
            $row = $userDb->getUser($this->email, $this->password);

            if(sizeof($row) == 0){
                // redirect
               header("location: ../../../client/html/templates/home.php?error=invalidCredentials");
               return;
           }

            session_start();
            $_SESSION["firstName"] = $row[0]['firstName'];
            $_SESSION["email"] = $row[0]['email'];
            $_SESSION["userId"] = $row[0]['userId'];

            header("location: ../../../client/html/templates/home.php?error=none");
        }

    }

?>