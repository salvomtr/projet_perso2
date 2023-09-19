<?php

require('../lib/user.php');

session_start();

// Teste si l'Utilisateur est enregistré
$isRegistred = false;

//lit les infos saisie dans le formulaire avec $_POST
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = trim(htmlspecialchars($_POST['mail']));
$passwordClear = trim(htmlspecialchars($_POST['password']));
$idRole = 2;

//creer un utilisateur que avec ces attribue
$retour = LibUser::create($nom, $prenom, $mail, $motDePasse, $idRole);
if ($retour) {
        // appel fucntion login
        $utilisateur = LibUser::login($mail, $motDePasse);
        if ($utilisateur !== null) {
                $_SESSION['nom'] = $utilisateur['nom'];
                $_SESSION['motDePasse'] = $utilisateur['motDePasse'];
                $_SESSION['utilisateur'] = $utilisateur;
                header('Location: /');
                exit;
        }

        header('Location: /ctrl/inscription-display.php');
}