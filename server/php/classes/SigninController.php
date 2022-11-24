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

            session_start();
            $_SESSION["firstName"] = $this->firstName;
            $_SESSION["email"] = $this->email;
            $_SESSION["userId"] = $userId;

            if($row == null){
                 // redirect
                header("location: ../../../client/html/templates/home.php?error=invalidCredentials");
            }
        }


    }

?>