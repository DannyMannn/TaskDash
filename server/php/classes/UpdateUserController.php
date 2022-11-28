<?php 
    class UpdateUserController{
        private $userId;
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $phoneNumber;
        private $city;
        private $description;

        public function __construct($userId,$firstName, $lastName, $email, $password, $phoneNumber, $city, $description){
            $this->userId = $userId;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->phoneNumber = $phoneNumber;
            $this->city = $city;
            $this->description = $description;
        }
        public function update(){
            $userDb = new User;
            $row = $userDb->updateUser($this->userId,$this->firstName, $this->lastName, $this->email, $this->password);
            $infoRow = $userDb->updatePersonalInfo($this->userId, $this->phoneNumber, $this->city, $this->description);
            
            session_start();
            $_SESSION["firstName"] = $this->firstName;
            $_SESSION["email"] = $this->email;
            $_SESSION["userId"] = $this->userId;
        }
    }
?>