-- Coded by: Ashle Johnson, Dana Archer, Tara-Lee Donald 

DROP DATABASE IF EXISTS dolphincrm;
CREATE DATABASE dolphincrm;
USE dolphincrm;

DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE `Contacts`(
    `id` int NOT NULL auto_increment,
    `title` VARCHAR(100) NOT NULL default '',
    `firstname` VARCHAR(50) NOT NULL default '',
    `lastname` VARCHAR(50) NOT NULL default '',
    `email` VARCHAR (50) NOT NULL default '',
    `telephone` VARCHAR(15) NOT NULL default '',
    `company` VARCHAR(30) NOT NULL default '',
    `type` VARCHAR(30) NOT NULL default '',
    `assigned_to` int,
    `created_by` int,
    `created_At` DATETIME NOT NULL default CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users`(
    `id` int NOT NULL auto_increment,
    `firstname` VARCHAR(50) NOT NULL default '',
    `lastname` VARCHAR(50) NOT NULL default '',
    `password` VARCHAR(25) NOT NULL default '',
    `email` VARCHAR(50) NOT NULL default '',
    `role` VARCHAR(20) NOT NULL default '',
    `created_at` DATETIME NOT NULL default CURRENT_TIMESTAMP,
   
    PRIMARY KEY(`id`)
    
    );


DROP TABLE IF EXISTS `Notes`;
CREATE TABLE `Notes`(
    `id` int NOT NULL AUTO_INCREMENT,
    `contact_id` int NOT NULL,
    `comment` VARCHAR(50) NOT NULL DEFAULT '',
    `created_by` int NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
);


INSERT INTO `Users` (id, firstname, lastname,password, email, role)
VALUES (1,'Marcelle','Kingston',SHA2('password123', 256), 'admin@project2.com', 'Admin');

INSERT INTO `Contacts` (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by) VALUES ('Mr', 'Daniel', 'Kingston', 'dKigston@gmail.com', '8766681123', 'JamRock', 'Support', 1, 1);
