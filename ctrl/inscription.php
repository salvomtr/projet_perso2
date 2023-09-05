<?php

require('../lib/user.php');

session_start();

// Teste si l'Utilisateur est enregistré, de façon très simple,
// parmi des utilisateurs écrits 'en dur'
$isRegistred = false;
//$listRegistredUser = ['john', 'sarah'];
//$candidateUser = $_POST['username'];
//$keyForCandidateUser = array_search($candidateUser, $listRegistredUser);

//lit les infos saisie dans le formulaire avec $_POST
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = trim(htmlspecialchars($_POST['mail']));
$motDePasse = $_POST['password'];
$idRole = 2;

//creer un utilisateur que avec ces attribue
$retour = LibUser::create($nom, $prenom, $mail, $motDePasse, $idRole);
if ($retour !== null) {
    $isRegistred = true;
}

// appel fucntion login
$utilisateur = LibUser::login($mail, $motDePasse);
if ($utilisateur !== null) {
    $isRegistred = true;
}


header('Location: /ctrl/inscription-display.php');
