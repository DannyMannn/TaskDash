<?php 
    class Notification extends DataBaseConnection{

        //get Notification from user Receiver
        public function getNotification($userId){
            $query = "SELECT * FROM `Notification` WHERE userReceiverId='$userId';";
            $conn = $this->connect();

            $stmt = $conn->query($query);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }

        //returns ID of newly created user
        //userID user who creates Notification (userSenderId)
        public function createNotif($userId,$userReceiverId,$description){
            $query = "INSERT INTO `Notification` (userSenderId,userReceiverId,description) VALUES ('$userId','$userReceiverId','$description');";
            $conn = $this->connect();

            $stmt = $conn->query($query);
            $last_id = $conn->lastInsertId();
            // return $last_id;
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        
        public function deleteNotifById($notifId){
            $query = "DELETE FROM `Notification` WHERE notificationId ='$notifId';";
            $connection = $this->connect();

            $stmt = $connection->query($query);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }

?>