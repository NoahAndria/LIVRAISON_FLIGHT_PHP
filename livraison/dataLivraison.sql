create database livraison_flight;
use livraison_flight;

create table Produit (
    id int primary key auto_increment,
    nom varchar(100),
    prix float,
    img varchar(100) default 'default.png',
    masse float
);
create table Livraison_coli (
    id int primary key auto_increment,
    id_entrepot_depart int,
    adr_destination varchar(100),   
    id_etat int default 1, 
    voiture varchar(20),
    id_chauffeur int,
    salaire_chauffeur float,
    date_livraison datetime
);
create table Produits_coli (
    id int primary key auto_increment,
    id_produit int,
    id_livraison int,
    quantite int
);
create table Entrepot (
    id int primary key auto_increment,
    adr_entrepot varchar(100)
);
create table Etat_livraison ( 
    id int primary key auto_increment,
    desc_etat varchar(20)
);
insert into Etat_livraison (desc_etat) values 
("en attente"), ("livre"), ("annule");

create table Chauffeur (
    id int primary key auto_increment,
    nom varchar(50)
);

-- Insertion des entrepôts
INSERT INTO Entrepot (adr_entrepot) VALUES 
('123 Rue de Paris, 75001 Paris'),
('456 Avenue des Champs, 69000 Lyon'),
('789 Boulevard Maritime, 13000 Marseille'),
('321 Rue du Commerce, 31000 Toulouse');

-- Insertion des produits
INSERT INTO Produit (nom, prix, masse, img) VALUES 
('Ordinateur Portable', 899.99, 0.9, 'laptop.jpeg'),
('Smartphone', 649.99, 0.4, 'smartphone.jpeg'),
('Casque Audio', 149.99, 0.3, 'headphone.jpeg'),
('Souris Sans Fil', 29.99, 0.2, 'mouse.jpeg'),
('Clavier Mécanique', 89.99, 0.4, 'keyboard.jpeg'),
('Écran 24"', 199.99, 2.2, "monitor.jpeg"),
('Imprimante', 129.99, 5, "printer.jpeg"),
('Tablette', 329.99, 1.3, "tablet.jpeg");

-- Insertion des livraisons
INSERT INTO Livraison_coli (id_entrepot_depart, adr_destination, id_etat) VALUES 
(1, '10 Avenue Mozart, 75016 Paris', 1),
(2, '25 Rue de la République, 69002 Lyon', 2),
(3, '15 Boulevard Victor Hugo, 13008 Marseille', 1),
(4, '8 Place du Capitole, 31000 Toulouse', 3),
(1, '42 Rue du Faubourg Saint-Honoré, 75008 Paris', 2),
(3, '67 Cours de la Liberté, 69003 Lyon', 1),
(4, '33 Quai des Chartrons, 33000 Bordeaux', 2),
(1, '19 Rue de la Paix, 06000 Nice', 1),
(2, '88 Avenue Jean Jaurès, 31000 Toulouse', 2),
(4, '55 Rue de Rivoli, 75004 Paris', 3);

INSERT INTO Livraison_coli
(id_entrepot_depart, adr_destination, id_etat, voiture, id_chauffeur, salaire_chauffeur, date_livraison)
VALUES
(1, 'Antananarivo Analakely', 1, 'Toyota Hilux', 101, 120000.50, '2025-01-10 08:30:00'),
(2, 'Toamasina Centre', 2, 'Nissan Navara', 102, 135000.00, '2025-01-11 09:15:00'),
(3, 'Fianarantsoa Gare', 1, 'Isuzu D-Max', 103, 110000.75, '2025-01-12 07:45:00'),
(4, 'Mahajanga Corniche', 3, 'Ford Ranger', 104, 150000.00, '2025-01-13 10:00:00'),
(1, 'Antsirabe Nord', 2, 'Toyota Land Cruiser', 105, 160000.00, '2025-01-14 06:50:00'),
(2, 'Toliara Port', 1, 'Mitsubishi L200', 106, 125000.25, '2025-01-15 11:20:00'),
(3, 'Morondava Centre', 4, 'Toyota Hilux', 107, 140000.00, '2025-01-16 13:40:00'),
(4, 'Nosy Be Hell-Ville', 1, 'Nissan Patrol', 108, 170000.00, '2025-01-17 15:10:00');

INSERT INTO Livraison_coli
(id_entrepot_depart, adr_destination, id_etat, voiture, id_chauffeur, salaire_chauffeur, date_livraison)
VALUES
(1, 'Antananarivo Itaosy', 1, 'Toyota Hilux', 109, 120000, '2022-03-15 08:10:00'),
(2, 'Toamasina Bazary Be', 3, 'Isuzu D-Max', 110, 145000, '2021-11-22 14:45:00'),
(3, 'Fianarantsoa Tanambao', 2, 'Nissan Navara', 111, 130000, '2023-06-05 09:30:00'),
(4, 'Mahajanga Tsaramandroso', 4, 'Ford Ranger', 112, 155000, '2020-01-18 16:20:00'),

(1, 'Antsirabe Centre', 3, 'Toyota Land Cruiser', 113, 165000, '2019-09-12 07:00:00'),
(2, 'Toliara Anketrake', 2, 'Mitsubishi L200', 114, 125000, '2024-02-28 11:50:00'),
(3, 'Moramanga Ville', 1, 'Toyota Hilux', 115, 118000, '2025-07-03 06:40:00'),
(4, 'Nosy Be Ambatoloaka', 3, 'Nissan Patrol', 116, 175000, '2018-12-31 18:15:00'),

(1, 'Antananarivo Ambohijatovo', 2, 'Isuzu D-Max', 117, 132000, '2023-10-09 10:25:00'),
(2, 'Brickaville Centre', 1, 'Toyota Hilux', 118, 122000, '2022-05-19 05:55:00'),
(3, 'Manakara Port', 4, 'Ford Ranger', 119, 160000, '2020-08-27 17:35:00'),
(4, 'Maintirano Ville', 2, 'Nissan Navara', 120, 135000, '2021-04-06 13:10:00');


INSERT INTO Produits_coli
(id_produit, id_livraison, quantite)
VALUES
(1, 1, 10),
(2, 1, 5),
(3, 2, 20),
(4, 2, 8),
(5, 3, 15),
(6, 3, 12),
(7, 4, 6),
(8, 4, 9),
(1, 5, 18),
(2, 5, 7),
(3, 6, 25),
(4, 6, 11),
(5, 7, 14),
(6, 7, 4),
(7, 8, 16),
(8, 8, 10);

INSERT INTO Produits_coli
(id_produit, id_livraison, quantite)
VALUES
-- Livraison 9
(1, 9, 12),
(3, 9, 7),
(5, 9, 20),

-- Livraison 10
(2, 10, 15),
(4, 10, 6),

-- Livraison 11
(6, 11, 10),
(8, 11, 4),

-- Livraison 12
(1, 12, 18),
(7, 12, 9),
(3, 12, 5),

-- Livraison 13
(2, 13, 22),
(5, 13, 11),

-- Livraison 14
(4, 14, 8),
(6, 14, 14),
(8, 14, 6),

-- Livraison 15
(1, 15, 30),
(2, 15, 10),

-- Livraison 16
(3, 16, 16),
(7, 16, 12),
(8, 16, 3),

-- Livraison 17
(5, 17, 25),

-- Livraison 18
(4, 18, 9),
(6, 18, 13),

-- Livraison 19
(1, 19, 20),
(2, 19, 15),
(3, 19, 8),

-- Livraison 20
(7, 20, 17),
(8, 20, 5);

create or replace view v_livraisons_detail as
select Livraison_coli.id as id_livraison, adr_entrepot , adr_destination, desc_etat from Livraison_coli
join Entrepot on Livraison_coli.id_entrepot_depart = Entrepot.id 
join Etat_livraison on Etat_livraison.id = Livraison_coli.id_etat;

-- sql pour le benefice d 'une livraison

create or replace view v_prix_total_livraison as select Produit.id as IdProduit , id_livraison , sum(quantite * prix) as prix_total from Produits_coli join Produit on Produits_coli.id_produit = Produit.id group by id_livraison;

select Livraison_coli.id  as id_livraison ,prix_total - salaire_chauffeur as benefice from Livraison_coli join v_prix_total_livraison on v_prix_total_livraison.id_livraison = Livraison_coli.id;

select sum(quantite * prix) as prix_total from Produits_coli join Produit on Produits_coli.id_produit = Produit.id join Livraison_coli on Livraison_coli.id = Produits_coli.id_livraison where MONTH(date_livraison) = 1;

