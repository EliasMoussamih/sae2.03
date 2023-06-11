create database bd;
use bd;
create table message(nom VARCHAR(50), prenom VARCHAR(50), email VARCHAR(50), message VARCHAR(50));
create user utilisateur identified by "eliastest";
grant select, insert on message to utilisateur;