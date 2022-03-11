USE `mvc_framework`;

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
    ('appel', 'groen', .75),
    ('sinaasappel', 'oranje', .65),
    ('citroen', 'geel', 1),
    ('tomaat', 'rood', .5),
    ('aardappel', 'bruin/beige', .25);
