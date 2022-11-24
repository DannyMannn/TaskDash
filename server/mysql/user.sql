USE TaskDash;
CREATE TABLE `Usuario`(
   `userId` INT NOT NULL AUTO_INCREMENT,
    `firstName` varchar(50) NOT NULL,
    `lastName` varchar(50) NOT NULL,
    `email` varchar(100) NOT NULL,
    `uPassword` varchar(50) NOT NULL,
    PRIMARY KEY(`userId`)
);

ALTER TABLE `Usuario`
    ADD CONSTRAINT email_unique UNIQUE (email);