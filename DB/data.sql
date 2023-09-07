-- INSERT INTO `role` (`id`, `nomRole`) VALUES (NULL, 'gestionnaire'), (NULL, 'utilisateur');

-- INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `motDePasse`, `idRole`) VALUES (NULL, 'Matraxia', 'Salvatore', 'salvomtr@outlook.com', '123456', '1');
-- INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `motDePasse`, `idRole`) VALUES (NULL, 'Todorov', 'Ion', 'todorov@outlook.com', '222222', '2');

-- INSERT INTO `article` (`id`, `titre`, `descriptionCourte`, `textArticle`, `immage`, `idUtilisateur`) VALUES (NULL, 'Salade César', 'The famous César Salade', 'Salade, poulet, parmesan, crouton de pain, jambon', '', '1');
-- INSERT INTO `categorie` (`id`, `nomCategorie`) VALUES (NULL, 'vegane'), (NULL, 'vegetarienne'), (NULL, 'sans gluten'), (NULL, 'ethnique'), (NULL, 'desserts');


[

INSERT INTO `role` (`id`, `nomRole`) VALUES (NULL, 'gestionnaire'), (NULL, 'utilisateur');

INSERT INTO `categorie` (`id`, `nomCategorie`) VALUES (NULL, 'vegetarien'), 
(NULL, 'viande'), (NULL, 'sauce'), (NULL, 'ethnique');

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `motDePasse`, `idRole`) VALUES 
(NULL, 'Matraxia', 'Salvatore', 'salvomtr@outlook.com', '123456', '1'), 
(NULL, 'Todorov', 'Ion', 'todorov@outlook.com', '6789', '2');

INSERT INTO `article` (`id`, `titre`, `descriptionCourte`, `textArticle`, `immage`, `idUtilisateur`, `idCategorie`, `difficulte`) 
VALUES (NULL, 'Salade César', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '1', '2',3), 
(NULL, 'Salade Nicoise', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '2', '1',4), 
(NULL, 'Salade riz', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '1', '1',2),
(NULL, 'Salade Catalane', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '2', '1',5), 
(NULL, 'Poluet Tandori', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '1', '2',4),
(NULL, 'Poulet Gaston Gerard', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '2', '2',2), 
(NULL, 'Sauce Chimichurri', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '1', '3',3), 
(NULL, 'Sauce Arrabbiata', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '2', '3',4), 
(NULL, 'Sauce Bologenese', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '1', '3',2), 
(NULL, 'Besciamella', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, veritatis quidem autem doloremque architecto adipisci voluptas reiciendis rem, est quo quod, quam saepe exercitationem harum assumenda hic. Sequi, nisi dignissimos?', '', '2', '3',5)
;

INSERT INTO `commentaire` (`id`, `textCommentaire`, `idArticle`, `idUtilisateur`) VALUES 
(NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '10', '1'),
(NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '8', '2');


SELECT `commentaire.textCommentaire`, `commentaire.idArticle`, `commentaire.idUtilisateur` FROM `commentaire` INNER JOIN `utilisateur` ON `commentaire.idUtilisateur` = `utilisateur.id`;
SELECT commentaire.textCommentaire, commentaire.idArticle, commentaire.idUtilisateur, utilisateur.nom FROM commentaire INNER JOIN utilisateur ON commentaire.idUtilisateur = utilisateur.id;
SELECT U.nom FROM utilisateur AS U INNER JOIN commentaire AS COM ON COM.idUtilisateur = U.id;
SELECT U.nom, ART.descriptionCourte, COM.textCommentaire, COM.id AS COM_ID, ART.id AS ART_ID FROM utilisateur AS U INNER JOIN commentaire AS COM ON COM.idUtilisateur = U.id INNER JOIN article AS ART ON COM.idArticle = ART.id;
SELECT ART.id AS idArticle, ART.titre, ART.descriptionCourte, ART.dateHeure, ART.pubblication FROM article as ART INNER JOIN utilisateur AS U ON ART.idUtilisateur = U.id;
 
 
 
 
 WHERE ART.dateHeure > date(now) - interval 10 days

 UPDATE article SET pubblication = NOT pubblication WHERE id=26;




