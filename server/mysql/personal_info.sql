USE taskdash;
CREATE TABLE `PersonalInfo`(
   `ID_personalInfo` INT NOT NULL AUTO_INCREMENT,
    `description` varchar(100) NULL,
    `phoneNumber` char(10) NOT NULL,
    `city` varchar(25) NOT NULL,
    `userID` int NOT NULL,
    PRIMARY KEY(`ID_personalInfo`)
);
ALTER TABLE `PersonalInfo`
    ADD CONSTRAINT fk_userId
    FOREIGN KEY (userId)
    REFERENCES usuario(ID_user);