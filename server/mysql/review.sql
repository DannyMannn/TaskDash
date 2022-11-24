USE TaskDash;
CREATE TABLE `Review`(
   `reviewId` INT NOT NULL AUTO_INCREMENT,
    `comment` varchar(150) NULL,
    `rating` tinyint,
    `userId` int NOT NULL,
    PRIMARY KEY(`reviewId`)
);
ALTER TABLE `Review`
    ADD CONSTRAINT fk_userId_review
    FOREIGN KEY (userId)
    REFERENCES usuario(userId);