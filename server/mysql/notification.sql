USE taskdash;
CREATE TABLE `Notification`(
   `ID_notification` varchar(100),
    `ID_userSender` int NOT NULL,
    `ID_userReceiver` int NOT NULL,
    `description` varchar(200),
    `dateCreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`ID_notification`)
);

-- USE taskdash;
-- ALTER TABLE `Notification`
-- ADD `dateCreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `Notification`
    ADD CONSTRAINT fk_userSender
    FOREIGN KEY (ID_userSender)
    REFERENCES usuario(ID_user);

ALTER TABLE `Notification`
    ADD CONSTRAINT fk_userReceiver
    FOREIGN KEY (ID_userReceiver)
    REFERENCES usuario(ID_user);