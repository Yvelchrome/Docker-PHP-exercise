CREATE TABLE IF NOT EXISTS `user` (
    `user_id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(256) NOT NULL,
    `admin` INT(1) NOT NULL,
    PRIMARY KEY (`user_id`)
);

CREATE TABLE IF NOT EXISTS `publication`(
    `publi_id` INT NOT NULL AUTO_INCREMENT,
    `userId` INT NOT NULL,
    `content` VARCHAR(280) NOT NULL,
    `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`publi_id`),
    FOREIGN KEY (`userId`) REFERENCES `user`(`user_id`)
);