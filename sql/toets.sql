USE `mvcframework`;

DROP TABLE IF EXISTS `countries`;

CREATE TABLE IF NOT EXISTS `countries`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    `capitalCity` VARCHAR(128) NOT NULL,
    `continent` ENUM('Afrika', 'Antarctica', 'Azië', 'Australië/Oceanië', 'Europa', 'Noord-Amerika', 'Zuid-Amerika') NOT NULL,
    `population` INT UNSIGNED NOT NULL,

    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=latin1;

INSERT INTO `countries`
    (`name`, `capitalCity`, `continent`, `population`)
VALUES
    ('Nederland', 'Amsterdam', 'Europa', 17134872),
    ('Duitsland', 'Berlijn', 'Europa', 	83222442),
    ('Australië', 'Canberra', 'Australië/Oceanië', 25499884),
    ('Rwanda', 'Kigali', 'Afrika', 12952218),
    ('Canada', 'Ottawa', 'Noord-Amerika', 37742154),
    ('-','-', 'Antarctica', 10000),
    ('China', 'Beijing', 'Azië', 1439323776);
