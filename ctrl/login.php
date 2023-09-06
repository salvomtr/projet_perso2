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
$mail = $_POST['mail'];
$motDePasse = $_POST['password'];


//cherche un utilisateur que possede cette mail et ce password
$utilisateur = LibUser::login($mail, $motDePasse);
if ($utilisateur !== null) {
    $isRegistred = true;
}

// Quand l'Utilisateur est enregistré,
// enregistre son 'username' en session et le redireige vers la page d'accueil
if ($isRegistred) {

    $_SESSION['nom'] = $utilisateur['nom'];
    $_SESSION['motDePasse'] = $utilisateur['motDePasse'];
    $_SESSION['utilisateur'] = $utilisateur;
   


    header('Location: /');
    exit;
}

// Par défaut,
// redirige l'Utilisateur vers la page de 'login' avec un message d'information
$_SESSION['msg_info'] = 'Nom d\'utilisateur inconnu.';
header('Location: /ctrl/login-display.php');
