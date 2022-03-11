USE `mvcframework`;

DROP TABLE `fruit`;

CREATE TABLE IF NOT EXISTS `fruit`(
    `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `color` VARCHAR(32) NOT NULL,
    `price` FLOAT NOT NULL,

    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=latin1;

INSERT INTO `fruit`
    (`name`, `color`, `price`)
VALUES
    ('Appel', 'groen', .75),
    ('Sinaasappel', 'oranje', .65),
    ('Citroen', 'geel', 1),
    ('Tomaat', 'rood', .5),
    ('Aardappel', 'bruin/beige', .25);
