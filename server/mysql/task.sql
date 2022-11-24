USE TaskDash;
CREATE TABLE `Task`(
   `taskId` INT NOT NULL AUTO_INCREMENT,
    `payment` int NOT NULL,
    `active` tinyint(1) NOT NULL,
    `description` varchar(250) NOT NULL,
    `userIdCreator` int NOT NULL,
    PRIMARY KEY(`taskId`)
);
ALTER TABLE `Task`
    ADD CONSTRAINT fk_userId_task
    FOREIGN KEY (userIdCreator)
    REFERENCES usuario(userId);