USE TaskDash;
CREATE TABLE `Notification`(
   `notificationId` varchar(100),
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
    REFERENCES usuario(userId);

ALTER TABLE `Notification`
    ADD CONSTRAINT fk_userReceiver
    FOREIGN KEY (userReceiverId)
    REFERENCES usuario(userId);