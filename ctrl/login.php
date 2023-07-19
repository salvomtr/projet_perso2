<?php

require_once('../lib/user.php');

session_start();

//lit les infos saisies dans le formulaire avec $_POST
$mail = $_POST['mail'];
$password = $_POST['password'];

//cherche un utilisateur qui possède ce nom et ce mot de passe
//$utilisateur = LibUser::find($mail, $password);
$utilisateur = My_login_user ($mail, $password);

if ($utilisateur !== null) {
    // L'utilisateur a été trouvé, enregistre les informations en session
    $_SESSION['email'] = $utilisateur['mail'];
    $_SESSION['password'] = $utilisateur['motDePasse'];
//gs_print ($utilisateur);
    header('Location: ../ctrl/article.php');
    exit;
} else {
    // L'utilisateur n'a pas été trouvé, redirige vers la page de connexion avec un message d'erreur
    $_SESSION['msg_error'] = 'Nom d\'utilisateur ou mot de passe incorrect.';
//gs_print ('prout');
    header('Location: /ctrl/login-display.php');
    exit;
}

?>