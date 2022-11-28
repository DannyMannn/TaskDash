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
    REFERENCES usuario(userId)
    ON DELETE CASCADE;

--esto es lo que se escribe en sql para modificar el foreign key
ALTER TABLE `Stats`
DROP FOREIGN KEY fk_userId_stats;

ALTER TABLE `Stats`
ADD CONSTRAINT fk_userId_stats
    FOREIGN KEY (userId)
    REFERENCES usuario(userId)
    ON DELETE CASCADE;

