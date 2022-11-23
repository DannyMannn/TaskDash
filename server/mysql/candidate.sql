USE taskdash;
CREATE TABLE `Candidate`(
   `ID_candidate` int NOT NULL AUTO_INCREMENT,
    `userId` int NOT NULL,
    `taskId` int NOT NULL,
    PRIMARY KEY(`ID_candidate`)
);
ALTER TABLE `Candidate`
    ADD CONSTRAINT fk_userId_candidate
    FOREIGN KEY (userId)
    REFERENCES usuario(ID_user);
ALTER TABLE `Candidate`
    ADD CONSTRAINT fk_taskId_candidate
    FOREIGN KEY (taskId)
    REFERENCES task(ID_task);