USE TaskDash;
CREATE TABLE `Review`(
   `reviewId` INT NOT NULL AUTO_INCREMENT,
    `comment` varchar(150) NULL,
    `rating` tinyint,
    `userId` int NOT NULL,
    `raterId` int NOT NULL,
    PRIMARY KEY(`reviewId`)
);
ALTER TABLE `Review`
    ADD CONSTRAINT fk_userId_review
    FOREIGN KEY (userId)
    REFERENCES Usuario(userId)
    ON DELETE CASCADE;

ALTER TABLE `Review`
    ADD CONSTRAINT fk_raterId_review
    FOREIGN KEY (raterId)
    REFERENCES Usuario(userId);

--esto es lo que se escribe en sql para modificar el foreign key
ALTER TABLE `Review`
DROP FOREIGN KEY fk_userId_review;

ALTER TABLE `Review`
ADD CONSTRAINT fk_userId_review
    FOREIGN KEY (userId)
    REFERENCES Usuario(userId)
    ON DELETE CASCADE;