USE TaskDash;
CREATE TABLE `Candidate`(
   `candidateId` int NOT NULL AUTO_INCREMENT,
    `userId` int NOT NULL,
    `taskId` int NOT NULL,
    PRIMARY KEY(`candidateId`)
);
ALTER TABLE `Candidate`
    ADD CONSTRAINT fk_userId_candidate
    FOREIGN KEY (userId)
    REFERENCES usuario(userId);
ALTER TABLE `Candidate`
    ADD CONSTRAINT fk_taskId_candidate
    FOREIGN KEY (taskId)
    REFERENCES task(taskId);