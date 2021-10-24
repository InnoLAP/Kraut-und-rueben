USE krautundrueben;

/* ------------------------------------ */
/* KUNDEN */
/* ------------------------------------ */

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2001, 'Wellensteyn','Kira','1990-05-05', SHA1('123'), 'Eppendorfer Landstrasse', '104', '20249','Hamburg','040/443322','k.wellensteyn@yahoo.de');

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2002, 'Foede','Dorothea','2000-03-24', SHA1('123'), 'Ohmstraße', '23', '22765','Hamburg','040/543822','d.foede@web.de');

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2003, 'Leberer','Sigrid','1989-09-21', SHA1('123'), 'Bilser Berg', '6', '20459','Hamburg','0175/1234588','sigrid@leberer.de');

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2004, 'Soerensen','Hanna','1974-04-03', SHA1('123'), 'Alter Teichweg', '95', '22049','Hamburg','040/634578','h.soerensen@yahoo.de');

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2005, 'Schnitter','Marten','1964-04-17', SHA1('123'), 'Stübels', '10', '22835','Barsbüttel','0176/447587','schni_mart@gmail.com');

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2006, 'Maurer','Belinda','1978-09-09', SHA1('123'), 'Grotelertwiete', '4a', '21075','Hamburg','040/332189','belinda1978@yahoo.de');

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2007, 'Gessert','Armin','1978-01-29', SHA1('123'), 'Küstersweg', '3', '21079','Hamburg','040/67890','armin@gessert.de');

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2008, 'Haessig','Jean-Marc', '1982-08-30', SHA1('123'),'Neugrabener Bahnhofstraße', '30', '21149','Hamburg','0178-67013390','jm@haessig.de');

INSERT INTO KUNDE (KUNDENNR, NACHNAME, VORNAME, GEBURTSDATUM, PASSWORT, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) VALUES (2009, 'Urocki','Eric','1999-12-04', SHA1('123'), 'Elbchaussee', '228', '22605','Hamburg','0152-96701390','urocki@outlook.de');

/* ------------------------------------ */
/* LIEFERANTEN */
/* ------------------------------------ */

INSERT INTO LIEFERANT (LIEFERANTENNR, LIEFERANTENNAME, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) values (101, 'Bio-Hof Müller', 'Dorfstraße', '74', '24354', 'Weseby', '04354-9080', 'mueller@biohof.de');

INSERT INTO LIEFERANT (LIEFERANTENNR, LIEFERANTENNAME, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) values (102, 'Obst-Hof Altes Land', 'Westerjork 74', '76', '21635', 'Jork', '04162-4523', 'info@biohof-altesland.de');

INSERT INTO LIEFERANT (LIEFERANTENNR, LIEFERANTENNAME, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) values (103, 'Molkerei Henning', 'Molkereiwegkundekunde', '13','19217', 'Dechow', '038873-8976', 'info@molkerei-henning.de');

INSERT INTO LIEFERANT (LIEFERANTENNR, LIEFERANTENNAME, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) values (104, 'Frisch Fisch Flitch', 'Nassenweg', '69','42069', 'Ragon', '035773-8266', 'info@FFFlitch.de');

INSERT INTO LIEFERANT (LIEFERANTENNR, LIEFERANTENNAME, STRASSE, HAUSNR, PLZ, ORT, TELEFON, EMAIL) values (105, 'Flash Fleisch Metzgerei', 'Muststrasse', '106', '22879', 'Jork', '09827-8329', 'bestellung@flash-fleisch.de');

/* ------------------------------------ */
/* ZUTATEN */
/* ------------------------------------ */

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1001, 'Zucchini','Stück', 0.89, 100, 101,19,2,1.6);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1002, 'Zwiebel','Stück', 0.15, 50, 101, 28, 4.9, 1.20);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1003, 'Tomate', 'Stück', 0.45, 50, 101, 18, 2.6, 1);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1004, 'Schalotte', 'Stück', 0.20, 500, 101, 25, 3.3, 1.5);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1005, 'Karotte', 'Stück', 0.30, 500, 101, 41, 10, 0.9);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1006, 'Kartoffel', 'Stück', 0.15, 1500, 101, 71, 14.6, 2);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1007, 'Rucola', 'Bund', 0.90, 10, 101, 27, 2.1, 2.6);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1008, 'Lauch', 'Stück', 1.2, 35, 101, 29, 3.3, 2.1);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1009, 'Knoblauch', 'Stück', 0.25, 250, 101, 141, 28.4, 6.1);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1010, 'Basilikum', 'Bund', 1.3, 10, 101, 41, 5.1, 3.1);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1011, 'Süßkartoffel', 'Stück', 2.0, 200, 101, 86, 20, 1.6);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1012, 'Schnittlauch', 'Bund', 0.9, 10, 101, 28, 1, 3);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1013, 'Paprika', 'Stück', 0.89, 80, 101, 20, 54, 1);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (2001, 'Apfel', 'Stück', 1.2, 750, 102, 54, 14.4, 0.3);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (3001, 'Vollmilch. 3.5%', 'Liter', 1.5, 50, 103, 65, 4.7, 3.4);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (3002, 'Mozzarella', 'Packung', 3.5, 20, 103, 241, 1, 18.1);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (3003, 'Butter', 'Stück', 3.0, 50, 103, 741, 0.6, 0.7);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (4001, 'Ei', 'Stück', 0.4, 300, 102, 137, 1.5, 11.9);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (5001, 'Wiener Würstchen', 'Stück', 1.8, 40, 101, 331, 1.2, 9.9);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (5002, 'Rinderhackfleisch', '100g', 0.94, 20, 105, 332, 0, 14);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (9001, 'Tofu-Würstchen', 'Stück', 1.8, 20, 103, 252, 7, 17);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (6408, 'Couscous', 'Packung', 1.9, 15, 102, 351, 67, 12);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (7043, 'Gemüsebrühe', 'Würfel', 0.2, 4000, 101, 1, 0.5, 0.5);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (6300, 'Kichererbsen', 'Dose', 1.0, 400, 103, 150, 21.2, 9);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1050, 'Filet (Fisch)', '100g', 5.0, 500, 104, 232, 17, 15);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1051, 'Hering', '100g', 5.0, 1500, 104, 207, 0, 18);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1052, 'Salz', '250g', 2.0, 5000, 104, 0, 0, 0);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1053, 'Reis', '100g', 0.9, 10000, 101, 130, 28, 2.7);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1054, 'Rote Bete', 'Dose', 1, 100, 101, 43, 10, 1.6);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1055, 'Pfeffer', '100g', 0.9, 10000, 104, 251, 64, 0);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1056, 'Blattspinat', '100g', 1, 200, 101, 17, 1.4, 2.9);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1057, 'Taigliatelle', '100g', 0.25, 300, 101, 138 ,25 ,4.5 );

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1058, 'Öl', 'Flasche', 1, 100, 101, 40, 0, 0);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1059, 'Frischkäse', '100g', 1, 100, 103, 342, 4.1, 6);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1060, 'Penne', '100g', 0.2, 300, 101, 138, 25, 4.5);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1061, 'Oregano', '5g', 0.5, 100, 102, 0, 0, 0);

INSERT INTO ZUTAT (ZUTATENNR, BEZEICHNUNG, EINHEIT, NETTOPREIS, BESTAND, lieferant, KALORIEN, KOHLENHYDRATE, PROTEIN) VALUES (1062, 'Chili', '10g', 1, 100, 101, 50, 5, 2);
/* ------------------------------------ */
/* BESTELLUNGEN */
/* ------------------------------------ */

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2001,'2020-07-01', 6.21);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2002,'2020-07-08', 32.96);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2003,'2020-08-01',24.08);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2004,'2020-08-02', 19.90);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2005,'2020-08-02', 6.47);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2006,'2020-08-10', 6.96);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2007,'2020-08-10', 2.41);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2008,'2020-08-10', 13.80);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2009,'2020-08-10', 8.67);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2007,'2020-08-15', 17.98);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2005,'2020-08-12', 8.67);

INSERT INTO BESTELLUNG (KUNDENNR, BESTELLDATUM, RECHNUNGSBETRAG) VALUES (2003,'2020-08-13', 20.87);

/* ------------------------------------ */
/* BESTELLUNGSZUTATEN (Hilfstabelle) */
/* ------------------------------------ */

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (1, 1001, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (1, 1002, 3);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (1, 1006, 2);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (1, 1004, 3);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (2, 9001, 10);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (2, 1005, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (2, 1003, 4);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (2, 6408, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (3, 6300, 15);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (3, 3001, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (4, 5001, 7);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (4, 3003, 2);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (5, 1002, 4);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (5, 1004, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (5, 1001, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (7, 1009, 9);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (6, 1010, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (8, 1012, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (8, 1008, 7);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (9, 1007, 4);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (9, 1012, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (10, 1011, 7);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (10, 4001, 7);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (11, 5001, 2);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (11, 1012, 5);

INSERT INTO BESTELLUNGZUTAT(BESTELLNR, ZUTATENNR, MENGE) VALUES (12, 1010, 15);

/* ------------------------------------ */
/* REZEPTE */
/* ------------------------------------ */

INSERT INTO REZEPTE(REZEPTNR, REZEPTNAME, REZEPTLINK, REZEPTZUTATENANZAHL, PORTIONENANZAHL) VALUES (1, 'Hering Schichtsalat', 'https://www.chefkoch.de/rezepte/1343691239180492/Hering-Schichtsalat.html', 5, 6);
INSERT INTO REZEPTE(REZEPTNR, REZEPTNAME, REZEPTLINK, REZEPTZUTATENANZAHL, PORTIONENANZAHL) VALUES (2, 'Zwiebelwürstchen', 'https://www.chefkoch.de/rezepte/2271501362610200/Zwiebelwuerstchen.html', 7, 2);
INSERT INTO REZEPTE(REZEPTNR, REZEPTNAME, REZEPTLINK, REZEPTZUTATENANZAHL, PORTIONENANZAHL) VALUES (3, 'Gebratene Kartoffeln mit Reis', 'https://eatsmarter.de/rezepte/gebratene-kartoffeln-mit-reis', 4, 1);
INSERT INTO REZEPTE(REZEPTNR, REZEPTNAME, REZEPTLINK, REZEPTZUTATENANZAHL, PORTIONENANZAHL) VALUES (4, 'Low Carb Bauerntopf', 'https://www.chefkoch.de/rezepte/3033411456059781/Low-Carb-Bauerntopf.html', 9, 3);
INSERT INTO REZEPTE(REZEPTNR, REZEPTNAME, REZEPTLINK, REZEPTZUTATENANZAHL, PORTIONENANZAHL) VALUES (5, 'Tagliatelle mit Spinat-Frischkäse-Sauce', 'https://www.lidl-kochen.de/rezeptwelt/tagliatelle-mit-spinat-frischkaese-sauce-144716?ref=search', 8, 4);
INSERT INTO REZEPTE(REZEPTNR, REZEPTNAME, REZEPTLINK, REZEPTZUTATENANZAHL, PORTIONENANZAHL) VALUES (6, 'Vegetarische one pot Pasta', 'https://www.gutekueche.at/vegetarische-one-pot-pasta-rezept-31565', 8, 4);



/* ------------------------------------ */
/* REZEPTEZUTAT (Hilfstabelle) - include the ingredients that match the recipe */
/* ------------------------------------ */

INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (1, 1051, 3);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (1, 1006, 4);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (1, 1054, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (1, 1002, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (1, 4001, 4);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (2, 5001, 4);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (2, 1002, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (2, 1003, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (2, 2001, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (2, 1053, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (2, 1052, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (2, 1055, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (3, 1053, 3);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (3, 1052, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (3, 1006, 4);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (3, 3003, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 5002, 4);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 1005, 4);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 1003, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 7043, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 1011, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 1002, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 1009, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 1052, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (4, 1055, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (5, 1002, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (5, 1009, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (5, 1056, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (5, 1057, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (5, 1058, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (5, 1059, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (5, 1055, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (5, 1052, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (6, 1003, 5);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (6, 1009, 6);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (6, 1002, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (6, 1060, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (6, 1061, 2);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (6, 1058, 3);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (6, 1052, 1);
INSERT INTO REZEPTEZUTAT(REZEPTNR, ZUTATENNR, MENGE) VALUES (6, 1062, 1);

/* ------------------------------------ */
/* DIET */
/* ------------------------------------ */

INSERT INTO DIET(DIETNR, DIETNAME) VALUES (1, 'Pescatarian');
INSERT INTO DIET(DIETNR, DIETNAME) VALUES (2, 'Vegan');
INSERT INTO DIET(DIETNR, DIETNAME) VALUES (3, 'Low Carb');
INSERT INTO DIET(DIETNR, DIETNAME) VALUES (4, 'Fleisch und Gemüse');
INSERT INTO DIET(DIETNR, DIETNAME) VALUES (5, 'Vegetarisch');


/* ------------------------------------ */
/* DIETREZEPTE (Hilfstabelle - exclude the recipes that do not match the diet */
/* ------------------------------------ */

INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (1, 2);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (2, 1);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (2, 2);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (2, 3);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (3, 4);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (4, 4);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (4, 2);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (5, 3);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (5, 5);
INSERT INTO DIETREZEPTE(DIETNR, REZEPTNR) VALUES (5, 6);



/* ------------------------------------ */
/* DIETZUTAT (Hilfstabelle) - exclude the ingredients that do not match the diet */
/* ------------------------------------ */

INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (1, 5001);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (2, 1051);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (2, 1050);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (2, 5001);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (2, 4001);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (2, 3003);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (2, 3001);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (2, 5002);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (2, 1059);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (3, 1006);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (3, 1011);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (3, 3001);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (3, 6408);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (3, 6300);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (3, 1053);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (4, 9001);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (5, 5001);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (5, 5002);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (5, 1050);
INSERT INTO DIETZUTAT(DIETNR, ZUTATENNR) VALUES (5, 1051);


/* ------------------------------------ */
/* ALLERGIE */
/* ------------------------------------ */

INSERT INTO ALLERGIE(ALLERGIENR, ALLERGIENAME) VALUES (1, 'Fisch');
INSERT INTO ALLERGIE(ALLERGIENR, ALLERGIENAME) VALUES (2, 'Milch');
INSERT INTO ALLERGIE(ALLERGIENR, ALLERGIENAME) VALUES (3, 'Gluten');
INSERT INTO ALLERGIE(ALLERGIENR, ALLERGIENAME) VALUES (4, 'Erdnüsse');
INSERT INTO ALLERGIE(ALLERGIENR, ALLERGIENAME) VALUES (5, 'Eier');
INSERT INTO ALLERGIE(ALLERGIENR, ALLERGIENAME) VALUES (6, 'Sellerie');

/* ------------------------------------ */
/* ALLERGIEREZEPTE (Hilfstabelle) - exclude the recipes that do not match the allergie */
/* ------------------------------------ */

INSERT INTO ALLERGIEREZEPTE(ALLERGIENR, REZEPTNR) VALUES (1, 1);
INSERT INTO ALLERGIEREZEPTE(ALLERGIENR, REZEPTNR) VALUES (2, 6);
INSERT INTO ALLERGIEREZEPTE(ALLERGIENR, REZEPTNR) VALUES (3, 5);
INSERT INTO ALLERGIEREZEPTE(ALLERGIENR, REZEPTNR) VALUES (3, 6);
INSERT INTO ALLERGIEREZEPTE(ALLERGIENR, REZEPTNR) VALUES (5, 5);

/* ------------------------------------ */
/* ALLERGIEZUTAT (Hilfstabelle) - exclude the ingredients that do not match the allergie */
/* ------------------------------------ */

INSERT INTO ALLERGIEZUTAT(ALLERGIENR, ZUTATENNR) VALUES (1, 1050);
INSERT INTO ALLERGIEZUTAT(ALLERGIENR, ZUTATENNR) VALUES (1, 1051);
INSERT INTO ALLERGIEZUTAT(ALLERGIENR, ZUTATENNR) VALUES (2, 3001);
INSERT INTO ALLERGIEZUTAT(ALLERGIENR, ZUTATENNR) VALUES (5, 1057);
INSERT INTO ALLERGIEZUTAT(ALLERGIENR, ZUTATENNR) VALUES (2, 1059);

/* ------------------------------------ */
/* KUNDEDIET (Hilfstabelle) */
/* ------------------------------------ */

INSERT INTO KUNDEDIET(DIETNR, KUNDENNR) VALUES (1,2008);
INSERT INTO KUNDEDIET(DIETNR, KUNDENNR) VALUES (2,2008);

/* ------------------------------------ */
/* KUNDEALLERGIE (Hilfstabelle) */
/* ------------------------------------ */

INSERT INTO KUNDEALLERGIE(ALLERGIENR, KUNDENNR) VALUES (1,2008);
INSERT INTO KUNDEALLERGIE(ALLERGIENR, KUNDENNR) VALUES (2,2008);

COMMIT WORK;
