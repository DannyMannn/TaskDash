<?php 
    class UpdateUserController{
        private $userId;
        private $firstName;
        private $lastName;
        private $email;
        private $password;

        public function __construct($userId,$firstName, $lastName, $email, $password){
            $this->userId = $userId;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
        }
        public function update(){
            $userDb = new User;
            $row = $userDb->updateUser($this->userId,$this->firstName, $this->lastName, $this->email, $this->password);

            session_start();
            $_SESSION["firstName"] = $this->firstName;
            $_SESSION["email"] = $this->email;
            $_SESSION["userId"] = $this->userId;
        }
    }
?>