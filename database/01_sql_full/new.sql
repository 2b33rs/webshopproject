-- Schema webshop
DROP SCHEMA IF EXISTS `webshop`;


-- Schema webshop
CREATE SCHEMA IF NOT EXISTS `webshop` DEFAULT CHARACTER SET utf8;


-- Table `webshop`.`user`
DROP TABLE IF EXISTS `webshop`.`user`;
CREATE TABLE IF NOT EXISTS `webshop`.`user` (
  `user_id` INT AUTO_INCREMENT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`)
);


-- Table `webshop`.`categorie`
DROP TABLE IF EXISTS `webshop`.`categorie`;
CREATE TABLE IF NOT EXISTS `webshop`.`categorie` (
  `categroie_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`categroie_id`)
);


-- Table `webshop`.`subcategorie`
DROP TABLE IF EXISTS `webshop`.`subcategorie`;
CREATE TABLE IF NOT EXISTS `webshop`.`subcategorie` (
  `subcategorie_id` INT NOT NULL,
  `categroie_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`subcategorie_id`),
  INDEX `fk_subcategorie_categorie1_idx` (`categroie_id` ASC),
  CONSTRAINT `fk_subcategorie_categorie1`
    FOREIGN KEY (`categroie_id`)
    REFERENCES `webshop`.`categorie` (`categroie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- Table `webshop`.`products`
DROP TABLE IF EXISTS `webshop`.`products`;
CREATE TABLE IF NOT EXISTS `webshop`.`products` (
  `products_id` INT NOT NULL,
  `subcategorie_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `images` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`products_id`),
  INDEX `fk_products_subcategorie1_idx` (`subcategorie_id` ASC) ,
  CONSTRAINT `fk_products_subcategorie1`
    FOREIGN KEY (`subcategorie_id`)
    REFERENCES `webshop`.`subcategorie` (`subcategorie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- Table `webshop`.`cart`
DROP TABLE IF EXISTS `webshop`.`cart`;
CREATE TABLE IF NOT EXISTS `webshop`.`cart` (
  `cart_id` INT AUTO_INCREMENT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`cart_id`),
  INDEX `fk_cart_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_cart_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `webshop`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- Table `webshop`.`orders`
DROP TABLE IF EXISTS `webshop`.`orders`;
CREATE TABLE IF NOT EXISTS `webshop`.`orders` (
  `orders_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `purchase_date` DATE NOT NULL,
  PRIMARY KEY (`orders_id`),
  INDEX `fk_orders_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_orders_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `webshop`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- Table `webshop`.`cart_products`
DROP TABLE IF EXISTS `webshop`.`cart_products`;
CREATE TABLE IF NOT EXISTS `webshop`.`cart_products` (
  `cart_products_id` INT AUTO_INCREMENT NOT NULL,
  `cart_id` INT NOT NULL,
  `products_id` INT NOT NULL,
  PRIMARY KEY (`cart_products_id`),
  INDEX `fk_cart_products_cart1_idx` (`cart_id` ASC) ,
  INDEX `fk_cart_products_products1_idx` (`products_id` ASC) ,
  CONSTRAINT `fk_cart_products_cart1`
    FOREIGN KEY (`cart_id`)
    REFERENCES `webshop`.`cart` (`cart_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_products_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `webshop`.`products` (`products_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- Table `webshop`.`orders_products`
DROP TABLE IF EXISTS `webshop`.`orders_products`;
CREATE TABLE IF NOT EXISTS `webshop`.`orders_products` (
  `orders_products_id` INT NOT NULL,
  `orders_id` INT NOT NULL,
  `products_id` INT NOT NULL,
  PRIMARY KEY (`orders_products_id`),
 INDEX `fk_orders_products_orders1_idx` (`orders_id` ASC) ,
 INDEX `fk_orders_products_products1_idx` (`products_id` ASC) ,
  CONSTRAINT `fk_orders_products_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `webshop`.`orders` (`orders_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_products_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `webshop`.`products` (`products_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- Insert `webshop`.`categorie`
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (1, 'Kostenlose Cloud-Speicher');
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (2, 'Bezahlte Cloud-Speicher');
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (3, 'Spezialisierte Cloud-Speicher');


-- Insert `webshop`.`subcategorie`
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


-- Insert `webshop`.`products`
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (1, 1, 'Google Drive', 'Kostenloser Cloud-Speicher von Google', 0.00, '../images/Produkt_Logos/GoogleWorkspace.jpg');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (2, 1, 'Dropbox', 'Kostenloser Cloud-Speicher von Dropbox', 0.00, '../images/Produkt_Logos/Dropbox.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (3, 1, 'Microsoft OneDrive', 'Kostenloser Cloud-Speicher von Microsoft', 0.00, '../images/Produkt_Logos/MicrosoftOneDrive.png');

INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (4, 2, 'MediaFire', 'Kostenloser Cloud-Speicher für große Dateien', 0.00, '../images/Produkt_Logos/MediaFire.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (5, 2, 'Mega', 'Kostenloser Cloud-Speicher für große Dateien', 0.00, '../images/Produkt_Logos/Mega.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (6, 2, 'pCloud', 'Kostenloser Cloud-Speicher für große Dateien', 0.00, '../images/Produkt_Logos/pCloud.png');

INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (7, 3, 'Tresorit', 'Kostenloser Cloud-Speicher mit erweiterten Sicherheitsfunktionen', 0.00, '../images/Produkt_Logos/Tresorit.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (8, 3, 'Sync.com', 'Kostenloser Cloud-Speicher mit erweiterten Sicherheitsfunktionen', 0.00, '../images/Produkt_Logos/Sync.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (9, 3, 'SpiderOak', 'Kostenloser Cloud-Speicher mit erweiterten Sicherheitsfunktionen', 0.00, '../images/Produkt_Logos/SpiderOak.png');

INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (10, 4, 'Google One', 'Erweiterter Cloud-Speicher von Google', 3.99, '../images/Produkt_Logos/GoogleOne.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (11, 4, 'Dropbox Plus', 'Erweiterte Funktionen für Dropbox', 9.99, '../images/Produkt_Logos/Dropbox.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (12, 4, 'Microsoft 365', 'Umfassendes Produktivitätspaket', 123.12, '../images/Produkt_Logos/Microsoft365.png');

INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (13, 5, 'iCloud', 'Cloud-Speicher von Apple', 28.99, '../images/Produkt_Logos/iCloud.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (14, 5, 'Box', 'Sicherer Cloud-Speicher', 123.12, '../images/Produkt_Logos/box.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (15, 5, 'Amazon Drive', 'Cloud-Speicher von Amazon', 59.99, '../images/Produkt_Logos/AmazonDrive.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (16, 6, 'Google Workspace', 'Kollaborations- und Produktivitätstools', 1312.12, '../images/Produkt_Logos/GoogleWorkspace.jpg');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (17, 6, 'Dropbox Business', 'Cloud-Speicher und Kollaboration für Unternehmen', 499.99, '../images/Produkt_Logos/Dropbox.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (18, 6, 'Microsoft 365 Business', 'Umfassende Lösung für Unternehmen', 39.99, '../images/Produkt_Logos/Microsoft365.png');

INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (19, 7, 'Adobe Creative Cloud', 'Kreative Tools für Fotografen', 19.99, '../images/Produkt_Logos/AdobeCreative.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (20, 7, 'SmugMug', 'Plattform für Fotografen zur Präsentation ihrer Werke', 13.99, '../images/Produkt_Logos/SmugMug.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (21, 7, '500px', 'Online-Community für Fotografen', 12.99);

INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (22, 8, 'SoundCloud', 'Plattform für Musiker zum Teilen und Entdecken von Musik', 12.88, '../images/Produkt_Logos/SoundCloud.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (23, 8, 'Bandcamp', 'Unabhängige Musikplattform für Künstler', 1337.88, '../images/Produkt_Logos/BandCamp.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (24, 8, 'Spotify for Artists', 'Tools für Musiker zur Verwaltung und Promotion ihrer Musik', 1263.4, '../images/Produkt_Logos/Spotify.png');

INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (25, 9, 'Vimeo', 'Plattform für Video-Hosting und -Sharing', 1337.88, '../images/Produkt_Logos/Vimeo.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (26, 9, 'Wistia', 'Video-Hosting-Plattform für Unternehmen', 123.45, '../images/Produkt_Logos/Wistia.png');
INSERT INTO `webshop`.`products` (`products_id`, `subcategorie_id`, `name`, `description`, `price`, `images`) 
VALUES (27, 9, 'Brightcove', 'Video-Plattform für Unternehmen und Content-Ersteller', 12.39, '../images/Produkt_Logos/BrideCove.png');



-- Insert `webshop`.`user`
INSERT INTO `webshop`.`user` (user_id, username, password, name,firstname,address,email) VALUES (0,"Max69",123,"Max","Mustermann","Musterstrasse 11", "maxmustermann@gmail.com");
INSERT INTO `webshop`.`user` (user_id, username, password, name,firstname,address,email) VALUES (1,"steffen",123,"Max","Mustermann","Musterstrasse 11", "maxmustermann@gmail.com");



