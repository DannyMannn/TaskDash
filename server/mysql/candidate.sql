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
    REFERENCES usuario(userId)
    -- ON DELETE CASCADE;

ALTER TABLE `Candidate`
    ADD CONSTRAINT fk_taskId_candidate
    FOREIGN KEY (taskId)
    REFERENCES task(taskId);

--esto es lo que debe de ir dentro de sql para cascade
ALTER TABLE `Candidate`
    DROP FOREIGN KEY fk_userId_candidate;

ALTER TABLE `Candidate`
    ADD CONSTRAINT fk_userId_candidate
    FOREIGN KEY (userId)
    REFERENCES usuario(userId)
    ON DELETE CASCADE;