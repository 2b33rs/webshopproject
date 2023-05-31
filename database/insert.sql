INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (1, 'Kostenlose Cloud-Speicher');
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (2, 'Bezahlte Cloud-Speicher');
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (3, 'Spezialisierte Cloud-Speicher');



INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (1, 1, 'Kostenlose Cloud-Speicher');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (2, 1, 'Bezahlte Cloud-Speicher');
INSERT INTO `webshop`.`subcategorie` (`subcategorie_id`, `categroie_id`, `name`) 
VALUES (3, 1, 'Spezialisierte Cloud-Speicher');
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

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (10, 4, 'Google One', 'Erweiterter Cloud-Speicher von Google', 'Preis abhängig von Speicher');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (11, 4, 'Dropbox Plus', 'Erweiterte Funktionen für Dropbox', '9.99 EUR/Monat');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (12, 4, 'Microsoft 365', 'Umfassendes Produktivitätspaket', 'Preis abhängig vom Plan');

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (13, 5, 'iCloud', 'Cloud-Speicher von Apple', 'Preis abhängig vom Speicherplan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (14, 5, 'Box', 'Sicherer Cloud-Speicher', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (15, 5, 'Amazon Drive', 'Cloud-Speicher von Amazon', 'Preis abhängig vom Speicherplan');

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (16, 6, 'Google Workspace', 'Kollaborations- und Produktivitätstools', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (17, 6, 'Dropbox Business', 'Cloud-Speicher und Kollaboration für Unternehmen', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (18, 6, 'Microsoft 365 Business', 'Umfassende Lösung für Unternehmen', 'Preis abhängig vom Plan');

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (19, 7, 'Adobe Creative Cloud', 'Kreative Tools für Fotografen', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (20, 7, 'SmugMug', 'Plattform für Fotografen zur Präsentation ihrer Werke', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (21, 7, '500px', 'Online-Community für Fotografen', 'Preis abhängig vom Plan');

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (22, 8, 'SoundCloud', 'Plattform für Musiker zum Teilen und Entdecken von Musik', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (23, 8, 'Bandcamp', 'Unabhängige Musikplattform für Künstler', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (24, 8, 'Spotify for Artists', 'Tools für Musiker zur Verwaltung und Promotion ihrer Musik', 'Kostenlos');

INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (25, 9, 'Vimeo', 'Plattform für Video-Hosting und -Sharing', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (26, 9, 'Wistia', 'Video-Hosting-Plattform für Unternehmen', 'Preis abhängig vom Plan');
INSERT INTO `webshop`.`product` (`product_id`, `subcategorie_id`, `name`, `description`, `price`) 
VALUES (27, 9, 'Brightcove', 'Video-Plattform für Unternehmen und Content-Ersteller', 'Preis abhängig vom Plan');


