USE taskdash;
CREATE TABLE `usuario`(
   `ID_user` INT NOT NULL AUTO_INCREMENT,
    `userName` varchar(50) NOT NULL,
    `lastName` varchar(50) NOT NULL,
    `email` varchar(100) NOT NULL,
    `uPassword` varchar(50) NOT NULL,
    PRIMARY KEY(`ID_user`)
);
