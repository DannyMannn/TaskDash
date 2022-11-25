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
            $_SESSION["firstName"] = $row[0]['firstName'];
            $_SESSION["email"] = $row[0]['email'];
            $_SESSION["userId"] = $row[0]['userId'];
            
            // $checkedPwd = password_verify($this->password,$row[0]["uPassword"]);   
            // if($checkedPwd == false){
            //     header("location: ../../../client/html/templates/home.php?error=wrongPassword");
            // }else{
            //     $_SESSION["firstName"] = $row[0]['firstName'];
            //     $_SESSION["email"] = $row[0]['email'];
            //     $_SESSION["userId"] = $row[0]['userId'];
            // header("location: ../../../client/html/templates/home.php?error=none");
                
            // }
            if($row == null){
                 // redirect
                header("location: ../../../client/html/templates/home.php?error=invalidCredentials");
            }
        }


    }

?>