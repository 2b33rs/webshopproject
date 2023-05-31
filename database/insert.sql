INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (1, 'Kostenlose Cloud-Speicher');
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (2, 'Bezahlte Cloud-Speicher');
INSERT INTO `webshop`.`categorie` (`categroie_id`, `name`) 
VALUES (3, 'Spezialisierte Cloud-Speicher');



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


