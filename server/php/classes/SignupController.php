<?php
    class SignupController{
        private $firstName;
        private $lastName;
        private $email;
        private $password;

        public function __construct($firstName, $lastName, $email, $password){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
        }

        public function signup(){
            $userDb = new User;
            if(sizeof($userDb->getUserByEmail($this->email)) > 0){
                header("location: ../../../client/html/templates/home.php?error=emailAlreadyExists");
                return;
            }
            
            $userId = $userDb->createUser($this->firstName, $this->lastName, $this->email, $this->password);

            session_start();
            $_SESSION["firstName"] = $this->firstName;
            $_SESSION["email"] = $this->email;
            $_SESSION["userId"] = $userId;

            header("location: ../../../client/html/templates/home.php?error=none");
        }


    }

?>