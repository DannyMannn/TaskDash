USE TaskDash;
CREATE TABLE `PersonalInfo`(
   `personalInfoId` INT NOT NULL AUTO_INCREMENT,
    `description` varchar(100) NULL,
    `phoneNumber` char(10) NOT NULL,
    `city` varchar(25) NOT NULL,
    `userId` int NOT NULL,
    PRIMARY KEY(`personalInfoId`)
);
ALTER TABLE `PersonalInfo`
    ADD CONSTRAINT fk_userId
    FOREIGN KEY (userId)
    REFERENCES usuario(userId)
    ON DELETE CASCADE;

--esto es lo que se escribe en sql para modificar el foreign key
ALTER TABLE `PersonalInfo`
    DROP FOREIGN KEY fk_userId;

ALTER TABLE `PersonalInfo`
    ADD CONSTRAINT fk_userId
    FOREIGN KEY (userId)
    REFERENCES usuario(userId)
    ON DELETE CASCADE;