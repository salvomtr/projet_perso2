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
$mail = $_POST['mail'];
$motDePasse = $_POST['password'];
$idRole = 2;

//creer un utilisateur que avec ces attribue
$utilisateur = LibUser::create($nom, $prenom, $mail, $motDePasse, $idRole);
if ($utilisateur !== null) {
    $isRegistred = true;
}

// Quand l'Utilisateur est enregistré,
// enregistre son 'username' en session et le redireige vers la page d'accueil
if ($isRegistred) {
    $_SESSION['nom'] = $utilisateur['nom'];
    $_SESSION['motDePasse'] = $utilisateur['motDePasse'];
    $_SESSION['user'] = $utilisateur;
    header('Location: /');
    exit;
}

// Par défaut,
// redirige l'Utilisateur vers la page de 'login' avec un message d'information
$_SESSION['msg_info'] = 'Nom d\'utilisateur inconnu.';
header('Location: /ctrl/login-display.php');