create database flight_php;
use flight_php;

create table Produit (
    id int primary key auto_increment,
    nom varchar(100),
    prix float,
    img varchar(100)
);

insert into Produit (nom, prix, img) values ("Produit 1", 1000.99, "1.jpg");
insert into Produit (nom, prix, img) values ("Produit 2", 999.99, "2.jpg");
insert into Produit (nom, prix, img) values ("Produit 3", 110.99, "3.jpg");