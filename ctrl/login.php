<?php

session_start();

// Teste si l'Utilisateur est enregistré, de façon très simple,
// parmi des utilisateurs écrits 'en dur'
$isRegistred = false;
$listRegistredUser = ['john', 'sarah'];
$candidateUser = $_POST['username'];
$keyForCandidateUser = array_search($candidateUser, $listRegistredUser);
if ($keyForCandidateUser !== false) {
    $isRegistred = true;
}

// Quand l'Utilisateur est enregistré,
// enregistre son 'username' en session et le redireige vers la page d'accueil
if ($isRegistred) {

    $_SESSION['username'] = $candidateUser;

    header('Location: /');
    exit;
}

// Par défaut,
// redirige l'Utilisateur vers la page de 'login' avec un message d'information
$_SESSION['msg_info'] = 'Nom d\'utilisateur inconnu.';
header('Location: /login-display.php');
