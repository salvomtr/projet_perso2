INSERT INTO `role` (`id`, `nomRole`) VALUES (NULL, 'gestionnaire'), (NULL, 'utilisateur');

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `motDePasse`, `idRole`) VALUES (NULL, 'Matraxia', 'Salvatore', 'salvomtr@outlook.com', '123456', '1');
INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `motDePasse`, `idRole`) VALUES (NULL, 'Todorov', 'Ion', 'todorov@outlook.com', '222222', '2');

INSERT INTO `article` (`id`, `titre`, `descriptionCourte`, `textArticle`, `immage`, `idUtilisateur`) VALUES (NULL, 'Salade César', 'The famous César Salade', 'Salade, poulet, parmesan, crouton de pain, jambon', '', '1');
INSERT INTO `categorie` (`id`, `nomCategorie`) VALUES (NULL, 'vegane'), (NULL, 'vegetarienne'), (NULL, 'sans gluten'), (NULL, 'ethnique'), (NULL, 'desserts');