create database livraison_flight;
use livraison_flight;

create table Produit (
    id int primary key auto_increment,
    nom varchar(100),
    prix float,
    masse float
);
create table Livraison_coli (
    id int primary key auto_increment,
    id_entrepot_depart int,
    adr_destination varchar(100),   
    id_etat int
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


-- Insertion des entrepôts
INSERT INTO Entrepot (adr_entrepot) VALUES 
('123 Rue de Paris, 75001 Paris'),
('456 Avenue des Champs, 69000 Lyon'),
('789 Boulevard Maritime, 13000 Marseille'),
('321 Rue du Commerce, 31000 Toulouse');

-- Insertion des produits
INSERT INTO Produit (nom, prix, masse) VALUES 
('Ordinateur Portable', 899.99, 0.9),
('Smartphone', 649.99, 0.4),
('Casque Audio', 149.99, 0.3),
('Souris Sans Fil', 29.99, 0.2),
('Clavier Mécanique', 89.99, 0.4),
('Écran 24"', 199.99, 2.2),
('Imprimante', 129.99, 5),
('Tablette', 329.99, 1.3);

-- Insertion des livraisons
INSERT INTO Livraison_coli (id_entrepot_depart, adr_destination, id_etat) VALUES 
(1, '10 Avenue Mozart, 75016 Paris', 1),
(2, '25 Rue de la République, 69002 Lyon', 2),
(3, '15 Boulevard Victor Hugo, 13008 Marseille', 1),
(4, '8 Place du Capitole, 31000 Toulouse', 3),
(5, '42 Rue du Faubourg Saint-Honoré, 75008 Paris', 2),
(6, '67 Cours de la Liberté, 69003 Lyon', 1),
(7, '33 Quai des Chartrons, 33000 Bordeaux', 2),
(8, '19 Rue de la Paix, 06000 Nice', 1),
(2, '88 Avenue Jean Jaurès, 31000 Toulouse', 2),
(5, '55 Rue de Rivoli, 75004 Paris', 3);