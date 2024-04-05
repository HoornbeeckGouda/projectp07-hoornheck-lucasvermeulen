DROP DATABASE IF EXISTS hekkensluiter;

CREATE DATABASE hekkensluiter;

USE hekkensluiter; 

DROP TABLE IF EXISTS gebruiker;
CREATE TABLE gebruiker (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(150) NOT NULL,
  wachtwoord varchar(150) NOT NULL,
  rolId int NOT NULL,
  voornaam varchar(15) NOT NULL,
  tussenvoegsel varchar(10) DEFAULT NULL,
  achternaam varchar(25) NOT NULL,
  telefoon int NOT NULL,
  sleutelnummer varchar(25) NOT NULL,
  start_datum timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ;
INSERT INTO `gebruiker` (`email`, `wachtwoord`, `rolId`, `voornaam`, `tussenvoegsel`, `achternaam`, `telefoon`, `sleutelnummer`) VALUES
('lucas.a.vermeulen@gmail.com', '$2y$10$BatUL/nfpcPhzeFE3q5AmeEl1YuENJKt9XkMurxHLiKtUOeiFpYdG', '1', 'lucas', '', 'vermeulen', '0613949094', '4'),
('peter.peterson@gmail.com', '$2y$10$BatUL/nfpcPhzeFE3q5AmeEl1YuENJKt9XkMurxHLiKtUOeiFpYdG', '2', 'peter', '', 'peterson', '0613949094', ''),
('eva.omega@gmail.com', '$2y$10$BatUL/nfpcPhzeFE3q5AmeEl1YuENJKt9XkMurxHLiKtUOeiFpYdG', '3', 'eva', '', 'omega', '0613949094', '');

DROP TABLE IF EXISTS rol;
CREATE TABLE rol (
  id int(11) NOT NULL AUTO_INCREMENT,
  naam varchar(25) NOT NULL,
  PRIMARY KEY (id)
) ;
INSERT INTO `rol` (`naam`) VALUES
('bewaker'),
('portier'),
('maatschappelijkewerker');

DROP TABLE IF EXISTS gevangenis;
CREATE TABLE gevangenis (
  id int(11) NOT NULL AUTO_INCREMENT,
  aantal varchar(25) NOT NULL,
  PRIMARY KEY (id)
) ;
INSERT INTO `gevangenis` (`aantal`) VALUES
('30');

DROP TABLE IF EXISTS gevangene;
CREATE TABLE gevangene (
  id int(11) NOT NULL AUTO_INCREMENT,
  cell varchar(15) NOT NULL,
  medewerkersid int(11) NOT NULL,
  voornaam varchar(15) NOT NULL,
  tussenvoegsel varchar(10) DEFAULT NULL,
  achternaam varchar(25) NOT NULL,
  postcode varchar(25) NOT NULL,
  straatnaam varchar(25) NOT NULL,
  woonplaats varchar(25) NOT NULL,
  geboorteplaats varchar(25) NOT NULL,
  huisnummer varchar(25) NOT NULL,
  burgerservicenummer varchar(25) NOT NULL,
  geboortedatum date NOT NULL,
  telefoon varchar(15) NOT NULL,
  email varchar(50) NOT NULL,
  foto LONGBLOB,
  start_datum timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO `gevangene` (`cell`, `medewerkersid`, `voornaam`, `tussenvoegsel`, `achternaam`, `postcode`, `straatnaam`, `woonplaats`, `geboorteplaats`, `huisnummer`, `burgerservicenummer`, `geboortedatum`, `telefoon`, `email`)
VALUES
('1',  '4' ,'Piet', 'van der', 'Berg', '5678CD', 'Kerkstraat', 'Rotterdam', 'Rotterdam', '20', '123456789', '1990-05-15', '0612345678', 'piet@example.com'),
('2',  '4' ,'Anna', '', 'de Vries', '9012EF', 'Schoolweg', 'Utrecht', 'Utrecht', '5', '987654321', '1985-12-10', '0687654321', 'anna@example.com'),
('3',  '4' ,'Mohammed', 'El', 'Hassan', '3456FG', 'Moskeestraat', 'Den Haag', 'Den Haag', '30', '543216789', '1978-07-25', '0623456789', 'mohammed@example.com'),
('4',  '4' ,'Sophie', '', 'Bakker', '7890HI', 'Bakkerssteeg', 'Groningen', 'Groningen', '15', '987123456', '1993-02-28', '0632145678', 'sophie@example.com'),
('5',  '4' ,'Erik', '', 'Molenaar', '2345JK', 'Molenweg', 'Amersfoort', 'Amersfoort', '25', '456789321', '1982-09-17', '0643215678', 'erik@example.com'),
('6',  '3' ,'Fatima', '', 'Ali', '6789KL', 'Arabischestraat', 'Eindhoven', 'Eindhoven', '12', '654789123', '1987-11-03', '0654321765', 'fatima@example.com'),
('7',  '3' ,'Thomas', '', 'Janssen', '0123MN', 'Thomasstraat', 'Maastricht', 'Maastricht', '8', '321987654', '1976-04-21', '0665432187', 'thomas@example.com'),
('8',  '3' ,'Laura', 'van den', 'Bosch', '4567OP', 'Boschlaan', 'Nijmegen', 'Nijmegen', '17', '456321789', '1995-08-09', '0678543219', 'laura@example.com'),
('9',  '3' ,'David', '', 'Kramer', '8901QR', 'Kramersweg', 'Enschede', 'Enschede', '22', '789654321', '1980-01-14', '0687654321', 'david@example.com'),
('10', '3' ,'Femke', '', 'Visser', '2345ST', 'Visserstraat', 'Leeuwarden', 'Leeuwarden', '11', '987654123', '1989-06-30', '0698765432', 'femke@example.com'),
('11', '3' ,'Mustafa', 'Al', 'Ibrahim', '6789UV', 'Ibrahimlaan', 'Breda', 'Breda', '7', '456123789', '1973-03-18', '0612345678', 'mustafa@example.com'),
('12', '3' ,'Emma', '', 'Smit', '9012WX', 'Smitstraat', 'Amsterdam', 'Amsterdam', '18', '789321654', '1998-11-20', '0623456789', 'emma@example.com'),
('13', '3' ,'Jasper', 'de', 'Boer', '3456YZ', 'Boerenweg', 'Rotterdam', 'Rotterdam', '9', '654123987', '1984-07-02', '0632145678', 'jasper@example.com'),
('14', '3' ,'Lisa', '', 'van Dijk', '7890AB', 'Dijkstraat', 'Utrecht', 'Utrecht', '14', '987654312', '1991-12-05', '0643219876', 'lisa@example.com'),
('15', '3' ,'Ali', '', 'Hassan', '2345CD', 'Hassanweg', 'Den Haag', 'Den Haag', '21', '321789654', '1979-05-19', '0654321987', 'ali@example.com'),
('16', '3' ,'Lotte', '', 'Brouwer', '5678EF', 'Brouwerijstraat', 'Groningen', 'Groningen', '16', '456987321', '1996-09-08', '0665432198', 'lotte@example.com'),
('17', '3' ,'Timo', '', 'van Leeuwen', '9012GH', 'Leeuwenstraat', 'Amersfoort', 'Amersfoort', '19', '789456123', '1986-02-14', '0676543219', 'timo@example.com'),
('18', '3' ,'Sarah', '', 'Kok', '1234IJ', 'Koksweg', 'Eindhoven', 'Eindhoven', '13', '654789321', '1994-04-30', '0687654321', 'sarah@example.com'),
('19', '3' ,'Joris', '', 'Vos', '4567KL', 'Vosstraat', 'Maastricht', 'Maastricht', '6', '123456789', '1977-08-12', '0698765432', 'joris@example.com'),
('20', '3' ,'Hannah', 'de', 'Graaf', '8901MN', 'Graafweg', 'Enschede', 'Enschede', '23', '987654321', '1983-10-27', '0612345678', 'hannah@example.com');


DROP TABLE IF EXISTS logboek;
CREATE TABLE logboek (
  id int(11) NOT NULL AUTO_INCREMENT,
  reden varchar(255) NOT NULL,
  medewerkerId int(11) NOT NULL,
  gevangeneId int(11) NOT NULL,
  actie varchar(25) DEFAULT NULL,
  tijd timestamp NOT NULL,
  opmerkingen varchar(255) NOT NULL,
  start_datum timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);



DROP TABLE IF EXISTS zaak;
CREATE TABLE zaak (
  id int(11) NOT NULL AUTO_INCREMENT,
  gevangeneId int(11) NOT NULL,
  reden varchar(255) NOT NULL,
  datum_arrestatie timestamp NOT NULL,
  datum_vrijkomst timestamp NULL,
  start_datum timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);


DROP TABLE IF EXISTS bezoek;
CREATE TABLE bezoek (
  id int(11) NOT NULL AUTO_INCREMENT,
  gevangeneNaam varchar(25) NOT NULL,
  reden varchar(255) NOT NULL,
  bezoekTijd timestamp NULL,
  start_datum timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);


