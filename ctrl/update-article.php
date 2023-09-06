<?php require_once('../lib/article.php');

session_start(); ?>


<?php $pageTitle = 'Update Article' ?>



<?php
$idUser = $_SESSION['utilisateur']['id'];
$title = $_POST['titre'];
$description = $_POST['descriptionCourte'];
$text = $_POST['textArticle'];
$picture = $_POST['immage'];
$idCategorie = $_POST['idCategorie'];
$difficulte = $_POST['difficulte'];
$idArticle = $_POST['id'];


// Appel de la fonction create() pour creer des articles
$articles = LibArticle::update($idArticle, $title, $description, $text, $picture, $idCategorie, $difficulte);


header('Location: /ctrl/article.php');
?>