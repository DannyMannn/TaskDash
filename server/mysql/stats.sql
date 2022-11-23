USE taskdash;
CREATE TABLE `Stats`(
   `ID_stats` INT NOT NULL AUTO_INCREMENT,
    `reputation` tinyint,
    `tasksCompleted` int,
    `tasksGiven` int,
    `userId` int NOT NULL,
    PRIMARY KEY(`ID_stats`)
);
ALTER TABLE `Stats`
    ADD CONSTRAINT fk_userId_stats
    FOREIGN KEY (userId)
    REFERENCES usuario(ID_user);

