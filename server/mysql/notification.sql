USE TaskDash;
CREATE TABLE `Notification`(
   `notificationId` INT NOT NULL AUTO_INCREMENT,
    `userSenderId` int NOT NULL,
    `userReceiverId` int NOT NULL,
    `description` varchar(200),
    `dateCreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`notificationId`)
);

-- USE taskdash;
-- ALTER TABLE `Notification`
-- ADD `dateCreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `Notification`
    ADD CONSTRAINT fk_userSender
    FOREIGN KEY (userSenderId)
    REFERENCES usuario(userId)
    -- ON DELETE CASCADE;

ALTER TABLE `Notification`
    ADD CONSTRAINT fk_userReceiver
    FOREIGN KEY (userReceiverId)
    REFERENCES usuario(userId)
    -- ON DELETE CASCADE;

--esto es lo que se escribe dentro de sql
--si el sender/receiver se eliminan que se elimine la notificación
ALTER TABLE `Notification`
    DROP FOREIGN KEY fk_userSender;
ALTER TABLE `Notification`
    DROP FOREIGN KEY fk_userReceiver;

ALTER TABLE `Notification`
    ADD CONSTRAINT fk_userSender
    FOREIGN KEY (userSenderId)
    REFERENCES usuario(userId)
    ON DELETE CASCADE;

ALTER TABLE `Notification`
    ADD CONSTRAINT fk_userReceiver
    FOREIGN KEY (userReceiverId)
    REFERENCES usuario(userId)
    ON DELETE CASCADE;