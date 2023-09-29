<?php $pageTitle = '' ?>

<?php require_once('../lib/article.php');

session_start();
?>

<?php

if (!array_key_exists ('utilisateur', $_SESSION)){
    header("Location: /ctrl/login.php");
    exit;
}

$idUser = $_SESSION['utilisateur']['id'];

//lit les infos saisie dans le formulaire avec $_POST
$text = $_POST['textCommentaire'];
$idArticle = $_POST['idArticle'];

// Appel de la fonction readAll() pour récupérer tous les articles
$articles = LibArticle::create_comment($text, $idArticle, $idUser);

//redirige utlisateur vers l article courant
header("Location: /ctrl/article-single.php?id=$idArticle");
?>