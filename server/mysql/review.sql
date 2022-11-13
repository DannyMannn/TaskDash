USE taskdash;
CREATE TABLE `Review`(
   `ID_review` INT NOT NULL AUTO_INCREMENT,
    `comment` varchar(150) NULL,
    `rating` tinyint,
    `userId` int NOT NULL,
    PRIMARY KEY(`ID_review`)
);
ALTER TABLE `Review`
    ADD CONSTRAINT fk_userId_review
    FOREIGN KEY (userId)
    REFERENCES usuario(ID_user);