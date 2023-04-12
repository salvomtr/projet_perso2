<?php

// Teste si l'Utilisateur est enregistré, de façon très simple
$listRegistredUser = ['john', 'sarah'];

$candidateUser = $_POST['username'];
$keyForCandidateUser = array_search($candidateUser, $listRegistredUser);

$isRegistred = false;
if ($keyForCandidateUser !== false) {
    $isRegistred = true;
}

if ($isRegistred) {

    session_start();
    $_SESSION['username'] = $candidateUser;
    header('Location: /');

} else {
    header('Location: /login-display.php');
}
