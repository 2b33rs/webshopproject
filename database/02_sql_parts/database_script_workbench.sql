-- MySQL Script generated by MySQL Workbench
-- Wed May 31 11:26:59 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema webshop
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `webshop` ;

-- -----------------------------------------------------
-- Schema webshop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `webshop` DEFAULT CHARACTER SET utf8 ;
USE `webshop` ;

-- -----------------------------------------------------
-- Table `webshop`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webshop`.`user` ;

CREATE TABLE IF NOT EXISTS `webshop`.`user` (
  `user_id` INT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webshop`.`categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webshop`.`categorie` ;

CREATE TABLE IF NOT EXISTS `webshop`.`categorie` (
  `categroie_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`categroie_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webshop`.`subcategorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webshop`.`subcategorie` ;

CREATE TABLE IF NOT EXISTS `webshop`.`subcategorie` (
  `subcategorie_id` INT NOT NULL,
  `categroie_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`subcategorie_id`),
  INDEX `fk_subcategorie_categorie1_idx` (`categroie_id` ASC) VISIBLE,
  CONSTRAINT `fk_subcategorie_categorie1`
    FOREIGN KEY (`categroie_id`)
    REFERENCES `webshop`.`categorie` (`categroie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webshop`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webshop`.`product` ;

CREATE TABLE IF NOT EXISTS `webshop`.`product` (
  `product_id` INT NOT NULL,
  `subcategorie_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `price` FLOAT NOT NULL,
  PRIMARY KEY (`product_id`),
  INDEX `fk_product_subcategorie1_idx` (`subcategorie_id` ASC) VISIBLE,
  CONSTRAINT `fk_product_subcategorie1`
    FOREIGN KEY (`subcategorie_id`)
    REFERENCES `webshop`.`subcategorie` (`subcategorie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webshop`.`cart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webshop`.`cart` ;

CREATE TABLE IF NOT EXISTS `webshop`.`cart` (
  `cart_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`cart_id`),
  INDEX `fk_cart_user_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_cart_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `webshop`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webshop`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webshop`.`order` ;

CREATE TABLE IF NOT EXISTS `webshop`.`order` (
  `order_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `purchase_date` DATE NOT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_order_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_order_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `webshop`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webshop`.`cart_product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webshop`.`cart_product` ;

CREATE TABLE IF NOT EXISTS `webshop`.`cart_product` (
  `cart_product_id` INT NOT NULL,
  `cart_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  PRIMARY KEY (`cart_product_id`),
  INDEX `fk_cart_product_cart1_idx` (`cart_id` ASC) VISIBLE,
  INDEX `fk_cart_product_product1_idx` (`product_id` ASC) VISIBLE,
  CONSTRAINT `fk_cart_product_cart1`
    FOREIGN KEY (`cart_id`)
    REFERENCES `webshop`.`cart` (`cart_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_product_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `webshop`.`product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webshop`.`order_product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webshop`.`order_product` ;

CREATE TABLE IF NOT EXISTS `webshop`.`order_product` (
  `order_product_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  PRIMARY KEY (`order_product_id`),
  INDEX `fk_order_product_order1_idx` (`order_id` ASC) VISIBLE,
  INDEX `fk_order_product_product1_idx` (`product_id` ASC) VISIBLE,
  CONSTRAINT `fk_order_product_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `webshop`.`order` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_product_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `webshop`.`product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Insert `webshop`.`categorie`
-- -----------------------------------------------------

INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (1, 'Kostenlose Cloud-Speicher');
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (2, 'Bezahlte Cloud-Speicher');
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (3, 'Spezialisierte Cloud-Speicher');

-- -----------------------------------------------------
-- Insert `webshop`.`subcategorie`
-- -----------------------------------------------------

INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (1, 1, 'Allgemeine kostenlose Cloud-Speicher');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (2, 1, 'Kostenlose Cloud-Speicher für große Dateien');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (3, 1, 'Kostenlose Cloud-Speicher mit erweiterten Sicherheitsfunktionen');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (4, 2, 'Allgemeine Bezahlte Cloud-Speicher');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (5, 2, 'Bezahlte Cloud-Speicher mit erweiterten Funktionen');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (6, 2, 'Bezahlte Cloud-Speicher für Unternehmen');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (7, 3, 'Cloud-Speicher für Fotografen');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (8, 3, 'Cloud-Speicher für Musiker');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (9, 3, 'Cloud-Speicher für Videos und Filme');

-- -----------------------------------------------------
-- Insert `webshop`.`product`
-- -----------------------------------------------------

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (1, 1, 'Google Drive', 'Kostenloser Cloud-Speicher von Google', 0.00);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (2, 1, 'Dropbox', 'Kostenloser Cloud-Speicher von Dropbox', 0.00);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (3, 1, 'Microsoft OneDrive', 'Kostenloser Cloud-Speicher von Microsoft', 0.00);

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (4, 2, 'MediaFire', 'Kostenloser Cloud-Speicher für große Dateien', 0.00);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (5, 2, 'Mega', 'Kostenloser Cloud-Speicher für große Dateien', 0.00);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (6, 2, 'pCloud', 'Kostenloser Cloud-Speicher für große Dateien', 0.00);

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (7, 3, 'Tresorit', 'Kostenloser Cloud-Speicher mit erweiterten Sicherheitsfunktionen', 0.00);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (8, 3, 'Sync.com', 'Kostenloser Cloud-Speicher mit erweiterten Sicherheitsfunktionen', 0.00);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (9, 3, 'SpiderOak', 'Kostenloser Cloud-Speicher mit erweiterten Sicherheitsfunktionen', 0.00);

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (10, 4, 'Google One', 'Erweiterter Cloud-Speicher von Google', 3.99);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (11, 4, 'Dropbox Plus', 'Erweiterte Funktionen für Dropbox', 9.99);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (12, 4, 'Microsoft 365', 'Umfassendes Produktivitätspaket', 123.12);

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (13, 5, 'iCloud', 'Cloud-Speicher von Apple', 28.99);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (14, 5, 'Box', 'Sicherer Cloud-Speicher', 123.12);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (15, 5, 'Amazon Drive', 'Cloud-Speicher von Amazon', 59.99);

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (16, 6, 'Google Workspace', 'Kollaborations- und Produktivitätstools', 1312.12);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (17, 6, 'Dropbox Business', 'Cloud-Speicher und Kollaboration für Unternehmen', 499.99);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (18, 6, 'Microsoft 365 Business', 'Umfassende Lösung für Unternehmen', 39.99);

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (19, 7, 'Adobe Creative Cloud', 'Kreative Tools für Fotografen', 19.99);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (20, 7, 'SmugMug', 'Plattform für Fotografen zur Präsentation ihrer Werke', 13.99);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (21, 7, '500px', 'Online-Community für Fotografen', 12.99);

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (22, 8, 'SoundCloud', 'Plattform für Musiker zum Teilen und Entdecken von Musik', 12.88);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (23, 8, 'Bandcamp', 'Unabhängige Musikplattform für Künstler', 1337.88);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (24, 8, 'Spotify for Artists', 'Tools für Musiker zur Verwaltung und Promotion ihrer Musik', 1263.45);

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (25, 9, 'Vimeo', 'Plattform für Video-Hosting und -Sharing', 1337.88);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (26, 9, 'Wistia', 'Video-Hosting-Plattform für Unternehmen', 123.45);
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (27, 9, 'Brightcove', 'Video-Plattform für Unternehmen und Content-Ersteller', 12.39);


-- -----------------------------------------------------
-- Insert `webshop`.`user`
-- -----------------------------------------------------

INSERT INTO `webshop`.`user` (user_id, username, password, name,firstname,address,email) VALUES (1,"Max69",123,"Max","Mustermann","Musterstrasse 11", "maxmustermann@gmail.com");
