-- Supprime la base de données si elle existe déjà
DROP DATABASE IF EXISTS `projet_perso`;

-- Crée la base de données
CREATE DATABASE IF NOT EXISTS `projet_perso`;

USE `projet_perso`;

-- CREATION TABLE ARTICLE
CREATE TABLE article (
    id bigint(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre varchar(50) NOT NULL,
    descriptionCourte varchar(300) NOT NULL,
    textArticle varchar(1000) NOT NULL,
    immage VARBINARY(50) NOT NULL,
    idUtilisateur bigint(20) NOT NULL
);

-- CREATION TABLE COMMENTAIRE
CREATE TABLE commentaire (
    id bigint(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    textCommentaire varchar(500) NOT NULL,
    idArticle bigint(20) NOT NULL,
    idUtilisateur bigint(20) NOT NULL 
);

-- CREATION TABLE UTILISATEUR
CREATE TABLE utilisateur (
    id bigint(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    e-mail varchar(50) NOT NULL,
    motDePasse varchar(50) NOT NULL,
    idRole bigint(20) NOT NULL
);

-- CREATION TABLE ROLE
CREATE TABLE role (
    id bigint(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomRole varchar(50) NOT NULL
   
);



-- CREATION TABLE CATEGORIE
CREATE TABLE categorie (
    id bigint(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomCategorie varchar(50) NOT NULL
   
);



ALTER TABLE article ADD CONSTRAINT `fk_article_utilisateur` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id);
ALTER TABLE commentaire ADD CONSTRAINT `fk_commentaire_article` FOREIGN KEY (idArticle) REFERENCES article(id);
ALTER TABLE commentaire ADD CONSTRAINT `fk_commentaire_utilisateur` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id);
ALTER TABLE utilisateur ADD CONSTRAINT `fk_utlisateur_role` FOREIGN KEY (idRole) REFERENCES role(id);




