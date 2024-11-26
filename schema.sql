-- DROP DATABASE IF EXISTS dolphincrm;
CREATE DATABASE dolphincrm;
USE dolphincrm;

-- DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE `Contacts`(
    `id` int NOT NULL auto_increment,
    `title` VARCHAR(100) NOT NULL default '',
    `firstname` VARCHAR(50) NOT NULL default '',
    `lastname` VARCHAR(50) NOT NULL default '',
    `email` VARCHAR NOT(50) NULL default '',
    `telephone` VARCHAR(15) NOT NULL default '',
    `company` VARCHAR(30) NOT NULL default '',
    `type` VARCHAR(30) NOT NULL default '',
    `assigned_to` int,
    `created_by` int,
    `created_At` DATETIME NOT NULL default CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

    PRIMARY KEY(`id`)
)