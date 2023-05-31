INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (1, 'Cloud Storage');

INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (1, 1, 'Kostenlose Cloud-Speicher');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (2, 1, 'Bezahlte Cloud-Speicher');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (3, 1, 'Spezialisierte Cloud-Speicher');


INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (1, 1, 'Google Drive', 'Cloud-Speicher von Google', 'Kostenlos');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (2, 1, 'Dropbox', 'Sicherer Cloud-Speicher', 'Kostenlos');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (3, 1, 'Microsoft OneDrive', 'Cloud-Speicher von Microsoft', 'Kostenlos');

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (4, 2, 'Google One', 'Erweiterter Cloud-Speicher von Google', 'Preis abhängig von Speicher');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (5, 2, 'Dropbox Plus', 'Erweiterte Funktionen für Dropbox', '9.99 EUR/Monat');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (6, 2, 'Microsoft 365', 'Umfassendes Produktivitätspaket', 'Preis abhängig vom Plan');

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (7, 3, 'Adobe Creative Cloud', 'Cloud-Speicher für Kreative', 'Preis abhängig von Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (8, 3, 'SoundCloud', 'Musik-Streaming und Cloud-Speicher', 'Preis abhängig von Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (9, 3, 'Vimeo', 'Videohosting und Cloud-Speicher', 'Preis abhängig von Plan');
