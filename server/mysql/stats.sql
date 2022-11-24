USE TaskDash;
CREATE TABLE `Stats`(
   `statsId` INT NOT NULL AUTO_INCREMENT,
    `reputation` tinyint,
    `tasksCompleted` int,
    `tasksGiven` int,
    `userId` int NOT NULL,
    PRIMARY KEY(`statsId`)
);
ALTER TABLE `Stats`
    ADD CONSTRAINT fk_userId_stats
    FOREIGN KEY (userId)
    REFERENCES usuario(userId);

