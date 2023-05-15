

CREATE DATABASE application_de_rencontre;

CREATE TABLE users (
  id int(50) NOT NULL primary key auto_increment,
  nom varchar(255) DEFAULT NULL,
  pseudo varchar(255) DEFAULT NULL,
  sexe varchar(255) DEFAULT NULL,
  sexe1 varchar(255) DEFAULT NULL,
  pays varchar(255) DEFAULT NULL,
  descrip varchar(555) DEFAULT NULL,
  passwords varchar(255) DEFAULT NULL,
  photo varchar(255) DEFAULT NULL,
  age int(255) DEFAULT NULL
);



CREATE TABLE messagerie (
  idM int(50) NOT NULL primary key auto_increment,
  id int(50) DEFAULT NULL,
  idS int(50) DEFAULT NULL,
  message varchar(555) DEFAULT NULL,
  dates date DEFAULT NULL,
  foreign key (id) references users(id)
);

